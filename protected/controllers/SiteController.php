<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $layout = "LandfinderLayout";
	public $db; public $trans;
	private $_assetsBase;
	// function for Assests Base
	public function getAssetsBase()
	{
		if ($this->_assetsBase === null) {
			$this->_assetsBase = Yii::app()->assetManager->publish(
					Yii::getPathOfAlias('application.assets'),
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
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$DataList = array();
		$sql = "SELECT l.list_id, cn.category_name,l.price,l.rate,l.property_title,l.land_location,l.property_type,l.area,l.area_unit,l.name,l.posted_date,u.company_logo,l.image_locator,u.uid
				FROM listing l
				LEFT JOIN users u ON u.uid = l.uid
				LEFT JOIN category_new cn ON cn.category_id = l.category_id
				WHERE l.category_id = ";
		$DataList['commercialProperty'] = $this->db	->createCommand($sql." 1 ")->queryAll();
		$DataList['residentialProperty'] = $this->db	->createCommand($sql." 2 ")->queryAll();
		$DataList['agricultureProperty'] = $this->db	->createCommand($sql." 3 ")->queryAll();
		$DataList['developersProperty'] = $this->db	->createCommand($sql." 4 ")->queryAll();
// 		CVarDumper::dump($DataList,10,true);
		
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index',
								array(
										"DataList"	=>	$DataList
									)
					);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
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
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}