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
				header("Location: /Users/default/login/?retUrl=$current_page");
				//$this->redirect(array("/Users/default/login/?retUrl=$current_page"));
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
	
	public function getInternalUserList(){
		$sql = "SELECT 	uid,full_name,user_type FROM users WHERE user_type = 2";
		$userList = $this->db	->createCommand($sql)->queryAll();
		return $userList;
	}
	
	public function Pagination($url,$total_count,$offset,$limit){
		$no_of_pages_to_display = "5";
		if($total_count==0){
			$pagination = "Showing 0-0 of 0 Records";
		} else {
			if (strpos($url,'?') !== false) {
				$url = $url;
			} else {
				$url = $url."?";
			}
			$no_of_pages = intval($total_count/$limit)+((($total_count%$limit)==0)?"0":"1");
			if($offset==0){
				$current_page  = (($offset)/$limit)+1;
			} else {
				$current_page  = round(($offset-1)/$limit)+1;
			}
			if($no_of_pages < $no_of_pages_to_display){
				$start_page = "1";
				$end_page = $no_of_pages;
			} else {
				if(($current_page-2)<=0){
					$start_page = "1";
					$end_page = $no_of_pages_to_display;
				} else {
					if(($current_page-2+$no_of_pages_to_display)<$no_of_pages){
						$start_page = $current_page-2;
						$end_page = $current_page+2;
					} else {
						$start_page = $no_of_pages-4;
						$end_page = $no_of_pages;
					}
				}
			}
			$start_count = $offset+1;
			if(($total_count-$offset)<= $limit){
				$total_limit = $total_count-$offset;
			}  else {
				$total_limit = $offset+$limit;
			}
			//$total_limit = $offset+$limit;
			$pagination = "<span style='float:left;line-height:80px;margin-right:10px;'>Showing $start_count-$total_limit of $total_count Records</span>";
			$pagination = $pagination."<ul class='pagination'>";
			if($start_page>1){
				$left_page_class="";
				$left_page_link=$url."&limit=".$limit."&offset=".(($current_page*$limit)-(2*$limit)+1);
				$link_title = "title='Prev Page'";
			} else {
				$left_page_class="class='disabled'";
				$left_page_link="#";
				$link_title = "";
			}
				
			$pagination = $pagination."<li $left_page_class><a href='$left_page_link' $link_title>&laquo;</a></li>";
			for ($i = $start_page; $i <= $end_page; $i++) {
				if($i==$current_page){
					$class_name = "class='active'";
					$next_tab_link = $url."&limit=$limit&offset=".(($i*$limit)-$limit+1);
					$active_page_highlight = " <span class='sr-only'>(current)</span>";
				} else {
					$class_name = "";
					$next_tab_link = $url."&limit=$limit&offset=".(($i*$limit)-$limit+1);
					$active_page_highlight = "";
				}
				$pagination .="<li $class_name><a href='$next_tab_link' title='$i'>$i</a></li>"; 
			}
			if($end_page>=$no_of_pages){
				$right_page_class="class='disabled'";
				$right_page_link="#";
				$link_title = "title='Next Page'";
			} else {
				$right_page_class="";
				$right_page_link=$url."&limit=".$limit."&offset=".(($current_page*$limit)+1);
				$link_title = "#";
			}
			$pagination = $pagination."<li $right_page_class><a href='$right_page_link' $link_title>&#187;</a></li>";
			$pagination = $pagination."</ul>";
		}
		return $pagination;
	}

	public function actionAddUser()
	{
		$model = new Users('register');
		$step = isset($_GET['step'])?$_GET['step']:"1";
		$sqlCity = "SELECT c.city_id,c.city_name,s.state_name 
						FROM city c 
						LEFT JOIN state s ON s.state_id = c.state_id 
						WHERE c.city_flag = 1";
		$tmpcityList = $this->db->createCommand($sqlCity)->queryAll();
		$cityList = array();
		foreach ($tmpcityList as $key=>$val){
			$cityList[$val['state_name']][$val['city_id']] = $val['city_name']; 
		}
		if(isset($_POST['Users']))
		{
			if($_POST['Users']['website_url']!=""){
				$httpExit = strpos($_POST['Users']['website_url'], "http");
				if($httpExit!==false){
					$_POST['Users']['website_url'] = "http://".$_POST['Users']['website_url'];
				}
			}
			if (isset($_POST['Users']['about_user'])){
				$model->about_user = $_POST['Users']['about_user'];
			}
			$model->attributes=$_POST['Users'];
			$model->status = 0;
			$model->created_by = Yii::app()->user->id;
			$model->created_time = time();
			$model->updated_by = Yii::app()->user->id;
			$model->update_time = time();
			$this->performAjaxValidation($model,'users-addUser-form');
			
			if($model->save())
			{
				Yii::app()->user->setFlash('sucess','User Created Successfully.');
				if($step=="1"){
					$url = Yii::app()->request->url;
					$this->redirect('/Users/default/EditUser?step=2&uid='.$model->uid);
				}
			} 
		}
		$this->render('addUser',
									array(
											'model'		=>	$model,
											'cityList'	=>	$cityList,
											'step'		=>	$step
										)
					);
	}
	
	public function actionEditUser(){
		$uid = isset($_GET['uid'])?$_GET['uid']:"";
		$model = Users::model()->findByAttributes(array('uid'=>$uid));
		$step = isset($_GET['step'])?$_GET['step']:"1";
		$sqlCity = "SELECT c.city_id,c.city_name,s.state_name
						FROM city c
						LEFT JOIN state s ON s.state_id = c.state_id
						WHERE c.city_flag = 1";
		$tmpcityList = $this->db->createCommand($sqlCity)->queryAll();
		$cityList = array();
		foreach ($tmpcityList as $key=>$val){
			$cityList[$val['state_name']][$val['city_id']] = $val['city_name'];
		}
		$subcategoryList = $ExistCatsList = $ExistCatsIds = array();
		if($step=="2"){
			$sqlExistCats = "SELECT service_id,status FROM user_services WHERE uid = :uid ";
			$ExistCats = $this->db->createCommand($sqlExistCats)->bindParam(":uid",$uid,PDO::PARAM_INT)->queryAll();
			foreach ($ExistCats as $key=>$val){
				$ExistCatsList[$val['service_id']] = $val;
				if($val['status']==1){
					array_push($ExistCatsIds,$val['service_id']);
				}
			}
			$sql = "SELECT subcategory_id,subcategory_name FROM subcategory ORDER BY subcategory_name";
			$subcategoryList = $this->db->createCommand($sql)->queryAll();
		}
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if(isset($_POST['Users']['website_url']) && ($_POST['Users']['website_url']!="")){
				$httpExit = strpos($_POST['Users']['website_url'], "http");
				if($httpExit!==false){
					$_POST['Users']['website_url'] = "http://".$_POST['Users']['website_url'];
				}
			}
			$model->status = 0;
			if (isset($_POST['Users']['about_user'])){
				$model->about_user = $_POST['Users']['about_user'];
			}
			$model->updated_by = Yii::app()->user->id;
			$model->update_time = time();
			$this->performAjaxValidation($model,'users-addUser-form');
			if(isset($_REQUEST['property_services']) && (!empty($_REQUEST['property_services']))){
				$insertArray = $updateArray = array();
				foreach ($_REQUEST['property_services'] as $key=>$val){
					if(!in_array($val,$ExistCatsIds)){
						if(isset($ExistCatsList[$val])){
							$tmp = "WHEN $val THEN 1";
							array_push($updateArray,$tmp);
						} else {
							$tmp = "('$uid','$val','1')";
							array_push($insertArray,$tmp);
						}
					}
				}
				$deactiveServiceList =array();
				foreach ($ExistCatsList as $key=>$val){
					if(!in_array($val['service_id'],$_REQUEST['property_services'])){
						array_push($deactiveServiceList,$val['service_id']);
					}
						
				}
				if(!empty($deactiveServiceList)){
					$sql = "UPDATE user_services SET status = 0 WHERE uid = :uid AND service_id IN(".implode(",",$deactiveServiceList).")";
					$rseult = $this->db->createCommand($sql)->bindParam(":uid",$uid,PDO::PARAM_INT)->execute();
				}
				if(!empty($insertArray)){
					$sql = "INSERT INTO user_services (uid,service_id,status) VALUES ".(implode(",",$insertArray));
					$rseult = $this->db->createCommand($sql)->execute();
				}
			} else if(!empty($ExistCatsList)){
				$sql = "UPDATE user_services SET status = 0 WHERE uid = :uid ";
				$rseult = $this->db->createCommand($sql)->bindParam(":uid",$uid,PDO::PARAM_INT)->execute();
			}
			if($model->save())
			{
				Yii::app()->user->setFlash('sucess','User Created Successfully.');
				$this->redirect('index');
				// form inputs are valid, do something here
			} else {
				CVarDumper::dump($model,10,true);
			}
		}
		$this->render('addUser',
				array(
						'model'				=>	$model,
						'cityList'			=>	$cityList,
						'step'				=>	$step,
						'subcategoryList'	=>	$subcategoryList,
						'ExistCatsIds'		=>	$ExistCatsIds
				)
		);
	}
	
	public function actionAJAXuploadTmpImg(){
		$tmpurl = "UserLogos/";
		if(isset($_GET['cat']) && $_GET['cat']=="property"){
			$tmpurl = "propertyImages/tmp/";
		} 
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
							$imgurl = $tmpurl.$file_name;
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
		
		$file_type = pathinfo($src, PATHINFO_EXTENSION);
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
		$coords['w'] = (($coords['w']==0)?100:$coords['w']);
		$coords['h'] = (($coords['h']==0)?100:$coords['h']);
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
	}
	
	public function actionMoveImages(){
		$cat = (isset($_POST['cat'])?$_POST['cat']:"");
		$filename = str_replace("propertyImages/tmp/", "", (isset($_POST['filepath'])?$_POST['filepath']:""));
		$from ="";
		$to = "";
		if($filename!=""){
			if($cat=="property"){
				$from = "propertyImages/tmp/".$filename;
				$to = "propertyImages/images/".$filename;
				 copy ( $from, $to);
				 unlink ( $from);
				 echo json_encode(array("msg"=>"File Moved Successfully","status"=>"200","filename"=>$to));
			} else {
				echo json_encode(array("msg"=>"No category Availble to process","status"=>"400"));
			}
		} else {
			echo json_encode(array("msg"=>"No file Availble to process","status"=>"404"));
		}
	}
	public function actionManageUsers(){
		$limit = 25;
		$userlist = $this->getInternalUserList();
		$offset = ((isset($_GET['offset']))?$_GET['offset']:"0");
		$name_email_number = trim((isset($_GET['email_number_name']) && $_GET['email_number_name']!="")?$_GET['email_number_name']:"");
		$created_from = (isset($_GET['created_from'])?strtotime($_GET['created_from']):"");
		$created_from = ($created_from!="")?strtotime(date('d M Y',$created_from)):$created_from;
		$created_to = (isset($_GET['created_to'])?strtotime($_GET['created_to']):"");
		$created_to = ($created_to!="")?(strtotime(date('d M Y',$created_to))+(60*60*24)):$created_to;
		$created_by = ((isset($_GET['created_by']) && $_GET['created_by']!="")?$_GET['created_by']:"");
		
		$where = "";
		if($name_email_number!=""){
			$name_email_number = "%".$name_email_number."%";
			$where .= " AND (u.full_name like :name_email_number OR u.email like :name_email_number OR u.mobile_no like :name_email_number)"; 
		}
		if($created_from!="" && $created_to!=""){
			$where .= " AND u.created_time BETWEEN ".$created_from." AND ".$created_to;
		} else if($created_from!="" && $created_to==""){
			$where .= " AND u.created_time > ".$created_from;
		} else if($created_from=="" && $created_to!=""){
			$where .= " AND u.created_time < ".$created_to;
		}
		if($created_by!=""){
			$where .= " AND u.created_by = :created_by ";
		}
		$sqlSelect = "u.uid,u.full_name,u.email,u.mobile_no,u.status,u.address,u.user_type,u.created_by,u.created_time,u.updated_by,u.update_time,u1.uid as c_uid,u1.user_type as c_user_type, u1.full_name as c_full_name";
		$sqlTables = "	FROM users u 
						LEFT JOIN users u1 ON u1.uid = u.created_by";
		$sqlWhere = "WHERE u.uid NOT IN (1,2) $where";
		$sqlGroup = "GROUP BY u.uid ";
		$sqlOrder = "ORDER BY u.update_time DESC";
		$sqlLimit = "LIMIT $offset,$limit";
		
		$sqlList = "SELECT $sqlSelect $sqlTables $sqlWhere $sqlGroup $sqlOrder $sqlLimit";
		
		$sqlListCount = "SELECT count(u.uid) as TotalCount $sqlTables $sqlWhere  ";
		$data = $this->db	->createCommand($sqlList);
		
		$dataCount = $this->db	->createCommand($sqlListCount);
		
		($name_email_number!="") && ($data = $data->bindParam(":name_email_number", $name_email_number, PDO::PARAM_STR))
								 &&	($dataCount = $dataCount->bindParam(":name_email_number", $name_email_number, PDO::PARAM_STR));
								 
		($created_by!="") && ($data = $data->bindParam(":created_by", $created_by, PDO::PARAM_STR))
							&& ($dataCount = $dataCount->bindParam(":created_by", $created_by, PDO::PARAM_STR));
		
		$data = $data->queryAll();
		$dataCount = $dataCount->queryRow();
		$pagination = $this->Pagination(preg_replace('/(&?limit=\d+)|(&?offset=\d+)/','',Yii::app()->request->url),$dataCount['TotalCount'],$offset,$limit);
		$this->render('ManageUsers',
									array(
											'data'			=>	$data,
											'userlist'		=>	$userlist,
											'pagination'	=>	$pagination,
											'dataCount'		=>	$dataCount
										)
					);
	}
	public function actionAJAXUpdateUserStatus(){
		$uid = $_POST['uid'];
		$newStatus = $_POST['newStatus'];
		$sql = "UPDATE users SET status = :status WHERE uid = :uid";
		$statusUpdate = $this	->	db	->	createCommand($sql)
										->	bindParam(":status",$newStatus,PDO::PARAM_INT)
										->	bindParam(":uid",$uid,PDO::PARAM_INT)
										->	execute();
		echo json_encode(array("uid"=>$uid,"newStatus"=>$newStatus));
	}

	public function getStateList(){
		return array(""=>"--Select State--","1"=>"Karnataka","2"=>"Kerala","3"=>"Tamiinadu");
	}
	public function getStaticCityList(){
		return array(""=>"--Select State--","1"=>"Bangalore","2"=>"Mysore","3"=>"Mangalore","4"=>"Calicut","5"=>"Kochin","6"=>"Hosur");
	}
	public function getAreaUnitList(){
		return array("Square Feet"=>"Square Feet","Square Yard"=>"Square Yard","Square Meter"=>"Square Meter","Acre"=>"Acre","Guntha"=>"Guntha","Ground"=>"Ground");
	}
	public function getMonthList(){
		return array(	
								"January"	=>	"January",
								"February"	=>	"February",
								"March"		=>	"March",
								"April"		=>	"April",
								"May"		=>	"May",
								"June"		=>	"June",
								"July"		=>	"July",
								"August"	=>	"August",
								"Septemeber"=>	"Septemeber",
								"October"	=>	"October",
								"November"	=>	"November",
								"December"	=>	"December"
							);
	}
	public function getYearList(){
		$yearList = array();
		$currentYear = date("Y",time());
		$startYear = $currentYear-1;
		for ($i=0; $i <=40 ; $i++) { 
			$yearList[$startYear+$i] = $startYear+$i;
		}
		return $yearList;
	}
	public function getAgeOfConstructionList(){
		return array(
									"New Construction"	=>	"New Construction",
									"Less Than 5 Years"	=>	"Less Than 5 Years",
									"5 To 10 Years"		=>	"5 To 10 Years",
									"10 To 15 Years"	=>	"10 To 15 Years",
									"15 To 20 Years"	=>	"15 To 20 Years",
									"Above 20 Years"	=>	"Above 20 Years"	
								);
	}
	public function getamenitiesList(){
		$ameniiesListsql = "SELECT * FROM  amenities WHERE status = 1";
		$ameniiesList = $this->db	->createCommand($ameniiesListsql)->queryAll();
		$ameniiesLists = array();
		foreach ($ameniiesList as $key=>$val){
			$ameniiesLists[$key] = $val;
		}
		return $ameniiesLists;
	}
	public function actionAddProperty()
	{
		$propId = ((isset($_GET['prop_id']) && $_GET['prop_id']!="")?$_GET['prop_id']:"");
		if($propId!=""){
			$model = new Properties('register');
			$propertyType = $this->getCategories();
			$subCatList = array();
			$property_sub_type = array(""=>"-- Select Sub Type--");
			$stateList = $this->getStateList();
			$cityList = $this->getStaticCityList();
			$areaUnit  = $this->getAreaUnitList();
			$monthsList = $this->getMonthList();
			$yearList = $this->getYearList();
			$ageOfConstruction = $this->getAgeOfConstructionList();
			
			$ameniiesList = $this->getamenitiesList();
			$ExistAmenitiesIds = array();
			
			if(isset($_POST['Properties']))
			{
				$model->attributes=$_POST['Properties'];
				$model->status = 0;
				$model->prop_owner = $propId;
				$model->age_of_construction = (isset($_POST['Properties']['age_of_construction'])?$_POST['Properties']['age_of_construction']:"");
				$model->area_unit = (isset($_POST['Properties']['area_unit'])?$_POST['Properties']['area_unit']:"");
				$model->property_address = (isset($_POST['Properties']['property_address'])?$_POST['Properties']['property_address']:"");
				$model->created_by = Yii::app()->user->id;
				$model->created_time = time();
				$model->updated_by = Yii::app()->user->id;
				$model->updated_time = time();
				$this->performAjaxValidation($model,'users-addUser-form');
				if($model->save())
				{
					$insertArray = $updateArray = array();
					
					if(isset($_REQUEST['property_amenities']) && (!empty($_REQUEST['property_amenities']))){
						$insertArray = array();
						foreach ($_REQUEST['property_amenities'] as $key=>$val){
							$tmp = "('$model->id','$val','1')";
							array_push($insertArray,$tmp);
						}
						echo count($insertArray);
						if(!empty($insertArray)){
							$sql = "INSERT INTO user_amenities (prop_id,amt_id,status) VALUES ".(implode(",",$insertArray));
							$rseult = $this->db->createCommand($sql)->execute();
						}
					} 
					Yii::app()->user->setFlash('sucess','User Created Successfully.');
					$url = Yii::app()->request->url;
					$this->redirect('/Users/default/ManageProperties');
				} 	
					//CVarDumper::dump($model,10,true); exit;
			}
			$this->render('addProperty',
										array(
												'model'					=>	$model,
												'propertyType'			=>	$propertyType,
												'subCatList'			=>	$subCatList,
												'stateList'				=>	$stateList,
												'cityList'				=>	$cityList,
												"areaUnit"				=>	$areaUnit,
												"monthsList"			=>	$monthsList,
												"yearList"				=>	$yearList,
												"ageOfConstruction"		=>	$ageOfConstruction,
												"ameniiesList"			=>	$ameniiesList,
												"property_sub_type"		=>	$property_sub_type,
												"ExistAmenitiesIds"		=>	$ExistAmenitiesIds
											)
			
					);
		} else {
			throw new CHttpException(400,"You Dont Have the vender information to add venders");
		}
	}
	public function actionEditProperty()
	{
		$id = (isset($_GET['id'])?$_GET['id']:"");
		$model = Properties::model()->findByAttributes(array('id'=>$id));
		$propertyType = $this->getCategories();
		$subCatList = array();
		$tmpproperty_sub_type = $this->getParentSubCategories($model->property_type);
		$property_sub_type = array(""=>"-- Select Sub Type--");
		foreach ($tmpproperty_sub_type as $key => $value) {
			$property_sub_type[$value['subcategory_parent_id']] =	$value['subcategory_parent_name']; 
		}
		
		$stateList = $this->getStateList();
		$cityList = $this->getStaticCityList();
		$areaUnit  = $this->getAreaUnitList();
		$monthsList = $this->getMonthList();
		$yearList = $this->getYearList();
		$ageOfConstruction = $this->getAgeOfConstructionList();
		
		$ameniiesList = $this->getamenitiesList();

		$ExistAmenitiesIds = array();
		
		$sqlExistAmenities = "SELECT prop_id,amt_id,status FROM user_amenities WHERE prop_id = :prop_id ";
		$ExistAmenities= $this->db->createCommand($sqlExistAmenities)->bindParam(":prop_id",$id,PDO::PARAM_INT)->queryAll();
		$ExistAmenitiesIds = $ExistAmenitiesList = array();
		foreach ($ExistAmenities as $key=>$val){
			$ExistAmenitiesList[$val['amt_id']] = $val;
			if($val['status']==1){
				array_push($ExistAmenitiesIds,$val['amt_id']);
			}
		}
		if(isset($_POST['Properties']))
		{
			$model->attributes=$_POST['Properties'];
			$model->age_of_construction = (isset($_POST['Properties']['age_of_construction'])?$_POST['Properties']['age_of_construction']:"");
			$model->area_unit = (isset($_POST['Properties']['area_unit'])?$_POST['Properties']['area_unit']:"");
			$model->property_address = (isset($_POST['Properties']['property_address'])?$_POST['Properties']['property_address']:"");
			$model->property_image = (isset($_POST['Properties']['property_image'])?$_POST['Properties']['property_image']:"");
			$model->property_image_2 = (isset($_POST['Properties']['property_image_2'])?$_POST['Properties']['property_image_2']:"");
			$model->property_image_3 = (isset($_POST['Properties']['property_image_3'])?$_POST['Properties']['property_image_3']:"");
			$model->property_image_4 = (isset($_POST['Properties']['property_image_4'])?$_POST['Properties']['property_image_4']:"");
			$model->property_image_5 = (isset($_POST['Properties']['property_image_5'])?$_POST['Properties']['property_image_5']:"");
			$model->status = 0;
			$model->created_by = Yii::app()->user->id;
			$model->created_time = time();
			$model->updated_by = Yii::app()->user->id;
			$model->updated_time = time();
			$this->performAjaxValidation($model,'users-addUser-form');
			if($model->save())
			{
				//CVarDumper::dump($model,10,true); exit;
				if(isset($_REQUEST['property_amenities']) && (!empty($_REQUEST['property_amenities']))){
					$insertArray = $activate = $deactivate = array();
					foreach ($ExistAmenitiesIds as $key1=>$val1){
						if(!in_array($val1,$_REQUEST['property_amenities'])){
							array_push($deactivate,$val1);
						} else {
							array_push($activate,$val1);
						}
					}
					foreach ($_REQUEST['property_amenities'] as $key=>$val){
						if(!in_array($val,$ExistAmenitiesIds)){
							$tmp = "('$id','$val','1')";
							array_push($insertArray,$tmp);
						}
					}
					
					if(!empty($deactivate)){
						$sql = "UPDATE user_amenities SET status = 0 WHERE prop_id = :prop_id AND  amt_id IN (".(implode(",",$deactivate)).")";
						$rseult = $this->db->createCommand($sql)->bindParam(":prop_id",$id,PDO::PARAM_INT)->execute();
					}
					if(!empty($activate)){
						$sql = "UPDATE user_amenities SET status = 1 WHERE prop_id = :prop_id AND  amt_id IN (".(implode(",",$activate)).")";
						$rseult = $this->db->createCommand($sql)->bindParam(":prop_id",$id,PDO::PARAM_INT)->execute();
					}
					if(!empty($insertArray)){
						$sql = "INSERT INTO user_amenities (prop_id,amt_id,status) VALUES ".(implode(",",$insertArray));
						$rseult = $this->db->createCommand($sql)->execute();
					}
				} else if(!empty($ExistCatsList)){
					$sql = "UPDATE user_amenities SET status = 0 WHERE prop_id = :prop_id ";
					$rseult = $this->db->createCommand($sql)->bindParam(":uid",$id,PDO::PARAM_INT)->execute();
				}
				Yii::app()->user->setFlash('sucess','User Created Successfully.');
				//if($step=="1"){
					$url = Yii::app()->request->url;
					$this->redirect('/Users/default/ManageProperties');
				//}
			} 	
				CVarDumper::dump($model,10,true); exit;
		}
		$this->render('addProperty',
									array(
											'model'					=>	$model,
											'propertyType'			=>	$propertyType,
											'subCatList'			=>	$subCatList,
											'stateList'				=>	$stateList,
											'cityList'				=>	$cityList,
											"areaUnit"				=>	$areaUnit,
											"monthsList"			=>	$monthsList,
											"yearList"				=>	$yearList,
											"ageOfConstruction"		=>	$ageOfConstruction,
											"ameniiesList"			=>	$ameniiesList,
											"property_sub_type"		=>	$property_sub_type,
											"ExistAmenitiesIds"		=>	$ExistAmenitiesIds
										)
					);
	}
	public function actionEditProperty1(){
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
		
		$offset = ((isset($_GET['offset']))?$_GET['offset']:"0");
		$limit = 100;
		$sSQLSelect = "p.id,p.property_for,p.location,c.city_name,p.property_condition,p.city,p.name,p.created_time,p.created_by,p.updated_time,p.updated_by,status,cn.category_name,p.property_for";
		$sSQLFrom  = "FROM properties p 
						LEFT JOIN city c ON p.city = c.city_id 
						LEFT JOIN category_new cn ON cn.category_id = p.property_type";
		$sql_where = "";
		$SQLoRDER = "order by p.updated_time DESC";
		
		$SQL = "SELECT $sSQLSelect $sSQLFrom $SQLoRDER LIMIT $offset, $limit ";
		$SQLCount = "SELECT count(*) $sSQLFrom";
						
		$Result = $this->db->createCommand($SQL)->queryAll();
		$ResultCount = $this->db->createCommand($SQLCount)->queryScalar();
		$pagination = $this->Pagination(preg_replace('/(&?limit=\d+)|(&?offset=\d+)/','',Yii::app()->request->url),$ResultCount,$offset,$limit);
		
		$this->render("ManageProperties",
											array(
														"Result"		=>	$Result,
														"pagination"	=>	$pagination,
														"ResultCount"	=>	$ResultCount
											)
					);
	}
	
	public function getCategories(){
		$sqlCat = "SELECT * FROM category_new";
		$propertyType = $this->db->createCommand($sqlCat)->queryAll();
		$mpArray = array();
		foreach ($propertyType as $key => $value) {
			$mpArray[$value['category_id']] = $value['category_name'];
		}
		return $mpArray;
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