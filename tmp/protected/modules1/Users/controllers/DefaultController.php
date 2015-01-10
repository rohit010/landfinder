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
		return true;
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
	public function actionAddUser()
	{
	
		$model = new Users('register');
		// uncomment the following code to enable ajax-based validation
		
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$model->user_logo = CUploadedFile::getInstance($model,'user_logo');
			$model->status = 0;
			$model->created_time = time();
			$this->performAjaxValidation($model,'users-addUser-form');
			
			if($model->save())
			{
				if($model->user_logo!=null){
					$model->user_logo->saveAs('UserLogos/'.$model->user_logo->name);
				}
				Yii::app()->user->setFlash('sucess','User Created Successfully.');
				$this->redirect('index');
				// form inputs are valid, do something here
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