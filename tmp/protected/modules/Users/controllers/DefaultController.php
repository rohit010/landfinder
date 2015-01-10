<?php

class DefaultController extends Controller
{
	public  $layout = "userLayout";
	public $db; public $trans;
	private $_assetsBase;
	public function getAssetsBase()
	{
		if ($this->_assetsBase === null) {
			$this->_assetsBase = Yii::app()->assetManager->publish(
					Yii::getPathOfAlias('application.modules.Users.assets'),
					false,
					-1,
					defined('YII_DEBUG') && YII_DEBUG
			);
		}
		return $this->_assetsBase;
	}
	public function beforeAction($action){
		$this->db = Yii::app()->db;
		
		if(!$this->db->getActive())
		{
			$this->trans = $this->db->beginTransaction();
		}
		$anaymonous_page_list =array("login","CourseExpiryCron","TestLiveFeed");
		$current_action = Yii::app()->controller->action->id;
		$current_page = urlencode(Yii::app()->request->url);
		if(!Yii::app()->user->id) {
			if(in_array($current_action,$anaymonous_page_list)){
				return TRUE;
			} else {
				$this->redirect(array("/Users/default/login/?retUrl=$current_page"));
			}
		} else {
			return TRUE;
		}
	}
	public function afterAction($action){
		if($this->db->getActive() && isset($this->trans) && $this->trans!=null){
			$this->trans->commit();
		}
	}
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionLogin()
	{
		Yii::app()->user->returnUrl = isset($_GET['retUrl'])?$_GET['retUrl']:"index";
		$this->layout = "emptyLayout";
		if (!defined('CRYPT_BLOWFISH')||!CRYPT_BLOWFISH)
			throw new CHttpException(500,"This application requires that PHP was compiled with Blowfish support for crypt().");
	
		$model=new LoginForm;
	
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionAddUser()
	{
		$model = new Users('register');
		// uncomment the following code to enable ajax-based validation
		
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$model->status = 0;
			$model->created_by = Yii::app()->user->id;
			$model->created_time = time();
			$this->performAjaxValidation($model,'users-addUser-form');
			
			if($model->save())
			{
				Yii::app()->user->setFlash('sucess','User Created Successfully.');
				$this->redirect('index');
				// form inputs are valid, do something here
			} else {
				CVarDumper::dump($model,10,true); 
			}
		}
		$this->render('addUser',array('model'=>$model));
	}
	
	public function actionAJAXuploadTmpImg(){
	//	CVarDumper::dump($_FILES,10,true);
		$msg = "";
		$status = 0;
		$imgurl = "";
		if(isset($_FILES['profile-logo'])){
			if(isset($_FILES['profile-logo']['type'])){
				if(in_array($_FILES['profile-logo']['type'],array('image/jpeg','image/jpg','image/pjpeg','image/x-png','image/gif','image/png'))){
					if(isset($_FILES['profile-logo']['size'])){
						if($_FILES['profile-logo']['size']<1024000){
							$files = explode(".",$_FILES["profile-logo"]["name"]);
							$file_name = isset($files[0])?$files[0]."_".time()."_.".$files[1]:$_FILES["profile-logo"]["name"];
							$imgurl = "UserLogos/".$file_name;
							move_uploaded_file($_FILES["profile-logo"]["tmp_name"],$imgurl);
							$msg = "Image uploaded Sussessfully";
							$status = 0;
						} else {
							$msg = "Image size is grater that 1MB please upload 1MB or less";
							$status = 0;
						}
					} else {
						$msg = "Image Not Found";
						$status = 0;
					}
				} else {
					$msg = "Invalid File!!! file should be jpg or png";
					$status = 0;
				}
			} else {
				$msg = "Image Not Found";
				$status = 0;
			}
		} else {
			$msg = "Image Not Found";
			$status = 0;
		}
		echo json_encode(array("msg"=>$msg,"status"=>$status,"imgurl"=>$imgurl));
	}
	
	public function actionAJAXuploadCropedImg(){
		
		$coords = $_POST;
		$src = $_POST['filepath'];
// 		if (!$this->thumbPath) {
// 			throw new CException(__CLASS__ . ' : thumbpath is not specified.');
// 		}
		
		$file_type = pathinfo($src, PATHINFO_EXTENSION);
// 		$thumbName = $this->thumbPath . '/' . pathinfo($src, PATHINFO_BASENAME);
		$thumbName = $src;
		if ($file_type == 'jpg' || $file_type == 'jpeg') {
			$img = imagecreatefromjpeg($src);
		}
		elseif ($file_type == 'png') {
			$img = imagecreatefrompng($src);
		}
		else {
			return false;
		}
		$dest_r = imagecreatetruecolor($coords['w'], $coords['h']);
		if (!imagecopyresampled($dest_r, $img, 0, 0, $coords['x'], $coords['y'], $coords['w'], $coords['h'], $coords['w'], $coords['h'])) {
			return false;
		}
		// save only png or jpeg pictures
		if ($file_type == 'jpg' || $file_type == 'jpeg') {
			imagejpeg($dest_r, $thumbName, 90);
		}
		elseif ($file_type == 'png') {
			imagepng($dest_r, $thumbName, 5);
		}
		return $thumbName;
		
		
		exit();
		
		$targ_w = $targ_h = 150;
		$jpeg_quality = 90;
		
		$src = $_POST['filepath'];
		$img_r = imagecreatefromjpeg($src);
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
		
		imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
		$targ_w,$targ_h,$_POST['w'],$_POST['h']);
		
		header('Content-type: image/jpeg');
		imagejpeg($dst_r,null,$jpeg_quality);
		exit();
	}
	public function actionManageUsers(){
		$sql = "SELECT * FROM users";
		$data = $this->db->createCommand($sql)->queryAll();
		$this->render('ManageUsers',array('data'=>$data));
	}

	public function actionEditUser(){
		$id = isset($_GET['id'])?$_GET['id']:"";
		$model = Users::model()->findByAttributes(array('uid'=>$id));
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$model->status = 0;
			$model->created_time = time();
			$model->about_user = $_POST['Users']['about_user'];
			$this->performAjaxValidation($model,'users-addUser-form');
			if($model->save())
			{
				Yii::app()->user->setFlash('sucess','User Created Successfully.');
				$this->redirect('index');
				// form inputs are valid, do something here
			} else {
				CVarDumper::dump($model,10,true);
			}
		}
		$this->render('addUser',array('model'=>$model));
	}
	public function actionAddProperty()
	{
		$model = new Listing('register');
		$propertyType = $this->getCategories();
		$cityList = array();
		// uncomment the following code to enable ajax-based validation
		$this->performAjaxValidation($model,'listing-addProperty-form');
		$getChildSubCategories = $this->getChildSubCategories();
		$subcategory_parent = array();
		if(isset($_POST['Listing']))
		{
			if(isset($_POST['Listing']['state']) && $_POST['Listing']['state']!=""){
				$cityListdata = $this->getCityList($_POST['Listing']['state']);
				foreach ($cityListdata as $k=>$v){
					$cityList[$v['city_id']] = $v['city_name'];
				}
			}
			$model->attributes = $_POST['Listing'];
			$model->uid = isset(Yii::app()->user->id)?Yii::app()->user->id:0;
			$model->status = 0;
			$model->posted_date = time();
			$model->aproved_date = time();
			
			if($model->save())
			{
				// form inputs are valid, do something here
				Yii::app()->user->setFlash('sucess','User Created Successfully.');
				$this->redirect('index');
			}
		}
		$this->render('addProperty',
									array(
											'model'					=>	$model,
											'propertyType'			=>	$propertyType,
											'getChildSubCategories'	=>	$getChildSubCategories,
											'cityList'				=>	$cityList,
											'subcategory_parent'	=>	$subcategory_parent
										)
					);
	}
	public function actionEditProperty(){
		$id = ((isset($_GET['id']) && $_GET['id']!="")?$_GET['id']:0);
		$model = Listing::model()->findByAttributes(array('list_id'=>$id));
		
		$propertyType = $this->getCategories();
		$cityListdata = $this->getCityList($model->state);
		foreach ($cityListdata as $k=>$v){
			$cityList[$v['city_id']] = $v['city_name'];
		}
		$this->performAjaxValidation($model,'listing-addProperty-form');
		$subcategory_parent = $this->getParentSubCategories($model->category_id);
		$getChildSubCategories = $this->getChildSubCategories();
		if(isset($_POST['Listing']))
		{
			if(isset($_POST['Listing']['state']) && $_POST['Listing']['state']!=""){
				$cityListdata = $this->getCityList($_POST['Listing']['state']);
				foreach ($cityListdata as $k=>$v){
					$cityList[$v['city_id']] = $v['city_name'];
				}
			}
			$model->attributes = $_POST['Listing'];
			$model->uid = isset(Yii::app()->user->id)?Yii::app()->user->id:0;
			$model->status = 0;
			$model->posted_date = time();
			$model->aproved_date = time();
				
			if($model->save())
			{
				// form inputs are valid, do something here
				Yii::app()->user->setFlash('sucess','User Created Successfully.');
				$this->redirect('index');
			}
		}
		$this->render('addProperty',
									array(
											'model'					=>	$model,
											'propertyType'			=>	$propertyType,
											'getChildSubCategories'	=>	$getChildSubCategories,
											'cityList'				=>	$cityList,
											'subcategory_parent'	=>	$subcategory_parent
									)
		);
	}
	
	public function actionManageProperties(){
		
		$SQL = "SELECT * 
						FROM listing 
					";
		$Result = $this->db->createCommand($SQL)->queryAll();
		
		$this->render("ManageProperties",
											array(
														"Result"	=>	$Result
											)
					);
	}
	
	public function getCategories(){
		$sqlCat = "SELECT * FROM category_new";
		$propertyType = $this->db->createCommand($sqlCat)->queryAll();
		return $propertyType;
	}
	public function getParentSubCategories($id){
		$sqlCat = "SELECT * FROM subcategory_parent WHERE category_id = :category_id ";
		$ParentSubCategories = $this->db	->createCommand($sqlCat)
											->bindParam(":category_id", $id, PDO::PARAM_INT)
											->queryAll();
		return $ParentSubCategories;
	}
	public function getChildSubCategories(){
		$sqlCat = "SELECT * FROM subcategory_child";
		$ChildSubCategories = $this->db	->createCommand($sqlCat)
		->queryAll();
		return $ChildSubCategories;
	}
	
	public function getCityList($id){
		$sqlCat = "SELECT city_id,city_name FROM city WHERE state_id = :state_id ";
		$cityList = $this->db	->createCommand($sqlCat)
								->bindParam(":state_id", $id, PDO::PARAM_INT)
								->queryAll();
		return $cityList;
	}
	
	protected function performAjaxValidation($model,$form)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']===$form)
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionAJAXUpdateParentSubCategories(){
		$id = isset($_GET['id'])?$_GET['id']:"0";
		$data = $this->getParentSubCategories($id);
		echo json_encode($data);
	}
	public function actionAJAXUpdateCityList(){
		$id = isset($_GET['id'])?$_GET['id']:"0";
		$data = $this->getCityList($id);
		echo json_encode($data);
	}
	
}