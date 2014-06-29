<?php

class SiteController extends Controller
{

	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('login'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('Config', 'SaveUser', 'SaveContacts', 'SaveContact', 'Logout', 'Index', 'SaveDays'),
						'users'=>array('@'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),

		);
	}
	/**
	 * Declares class-based actions.
	 */
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
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->redirect(array('/catalog/category/index'));
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
					"Content-type: text/plain; charset=UTF-8";

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
		$this->layout="login";
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

	function actionConfig(){
		$user=Yii::app()->db->createCommand()->select('*')->from('site_admin')->where('id = 1')->queryAll();
		$user=$user[0];
		$contacts=Contacts::model()->findByPk(1);
		$params=Yii::app()->db->createCommand()->select('*')->from('params')->queryAll();
		$days=Days::model()->findAll();
		$days=$days[0];
		$this->render('settings', array('user'=>$user, 'days'=>$days, 'contacts'=>$contacts, 'params'=>$params));
	}

	function actionSaveUser(){
		$params=Yii::app()->db->createCommand()->select('*')->from('params')->queryAll();
		$contacts=Contacts::model()->findByPk(1);
		if(isset($_POST['login']) && isset($_POST['password'])
			&& isset($_POST['newpassword']) && isset($_POST['newpasswordconf'])){
			if($_POST['newpassword']!=$_POST['newpasswordconf']){
				$this->render('settings', array('user'=>$user, 'status'=>0, 'contacts'=>$contacts));
				return null;
			}
			$user=Yii::app()->db->createCommand()->select('*')->from('site_admin')
			->where('password = :password', array(':password'=>$_POST['password']))->queryAll();
			if(count($user)!=1){
				$user=Yii::app()->db->createCommand()->select('*')->from('site_admin')->where('id = 1')->queryAll();
				$user=$user[0];
				echo $_POST['password'];
				$this->render('settings', array('user'=>$user, 'status'=>0, 'contacts'=>$contacts, 'params'=>$params));
				return null;
			}
			Yii::app()->db->createCommand()->update('site_admin',
			array('name'=>$_POST['login'],
				'password'=>$_POST['newpassword']), 'id = :id', array(':id'=>1));
			$user=Yii::app()->db->createCommand()->select('*')->from('site_admin')->where('id = 1')->queryAll();
			$user=$user[0];
			$days=Days::model()->findAll();
			$days=$days[0];
			$this->render('settings', array('user'=>$user, 'days'=>$days, 'contacts'=>$contacts, 'params'=>$params));

		}
	}

	function actionSaveContacts(){
		$params=Params::model()->findAll();
		$params[0]->value=$_POST['firm'];
		$params[0]->save();
		$params[1]->value=$_POST['unp'];
		$params[1]->save();
		$params[2]->value=$_POST['phone'];
		$params[2]->save();
		$params[3]->value=$_POST['email'];
		$params[3]->save();
		$params[4]->value=$_POST['vk'];
		$params[4]->save();
		$params[5]->value=$_POST['odn'];
		$params[5]->save();
		$params[6]->value=$_POST['fb'];
		$params[6]->save();
		$params[7]->value=$_POST['instagram'];
		$params[7]->save();
		$params[8]->value=$_POST['slogan'];
		$params[8]->save();


		$contact=Contacts::model()->findByPk(1);
		$user=Yii::app()->db->createCommand()->select('*')->from('site_admin')->where('id = 1')->queryAll();
		$user=$user[0];
		$params=Yii::app()->db->createCommand()->select('*')->from('params')->queryAll();
		$days=Days::model()->findAll();
		$days=$days[0];
		$this->render('settings', array('user'=>$user, 'days'=>$days, 'contacts'=>$contact, 'params'=>$params));
	}
}
