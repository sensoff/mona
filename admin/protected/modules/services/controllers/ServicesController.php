<?php

class ServicesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Services;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Services']))
		{
			$model->attributes=$_POST['Services'];
			$model->img1=CUploadedFile::getInstance($model,'image1');
			$model->img2=CUploadedFile::getInstance($model,'image2');
			if($model->img1){
				$length = 15;
				$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
				shuffle($chars);
				$name = implode(array_slice($chars, 0, $length));
				$model->image1=$name.'.'.$model->img1->getExtensionName();
			}
			if($model->img2){
				$length = 15;
				$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
				shuffle($chars);
				$name = implode(array_slice($chars, 0, $length));
				$model->image2=$name.'.'.$model->img2->getExtensionName();
			}
			if($model->save()){
				
				if($model->img1){
					$model->img1->saveAs(realpath(Yii::getPathOfAlias('webroot').'/../images/service').'/'.$model->image1);
					$ih = new CImageHandler();
					Yii::app()->ih->load(realpath(Yii::getPathOfAlias('webroot').'/../images/service').'/'.$model->image1)->
					thumb('300', false)->
					save(realpath(Yii::getPathOfAlias('webroot').'/../images/service/medium').'/'.$model->image1);
				}
				if($model->img2){
					$model->img2->saveAs(realpath(Yii::getPathOfAlias('webroot').'/../images/service').'/'.$model->image2);
					$ih = new CImageHandler();
					Yii::app()->ih->load(realpath(Yii::getPathOfAlias('webroot').'/../images/service').'/'.$model->image2)->
					thumb('300', false)->
					save(realpath(Yii::getPathOfAlias('webroot').'/../images/service/medium').'/'.$model->image2);
				}
				$this->redirect(array('index'));
			}
		}
		$counts=Services::getCounts();
		$this->render('create',array(
			'model'=>$model,
			'counts'=>$counts,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Services']))
		{
			$oldimg1=$model->image1;
			$oldimg2=$model->image2;
			$model->attributes=$_POST['Services'];
			$model->img1=CUploadedFile::getInstance($model,'image1');
			$model->img2=CUploadedFile::getInstance($model,'image2');
			if($model->img1){
				$length = 15;
				$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
				shuffle($chars);
				$name = implode(array_slice($chars, 0, $length));
				$model->image1=$name.'.'.$model->img1->getExtensionName();
			} else {
				$model->image1=$oldimg1;
			}
				
			if($model->img2){
				$length = 15;
				$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
				shuffle($chars);
				$name = implode(array_slice($chars, 0, $length));
				$model->image2=$name.'.'.$model->img2->getExtensionName();
			} else {
				$model->image2=$oldimg2;
			}
			
			if($model->save()){
			if($model->img1){
					$model->img1->saveAs(realpath(Yii::getPathOfAlias('webroot').'/../images/service').'/'.$model->image1);
					$ih = new CImageHandler();
					Yii::app()->ih->load(realpath(Yii::getPathOfAlias('webroot').'/../images/service').'/'.$model->image1)->
					thumb('300', false)->
					save(realpath(Yii::getPathOfAlias('webroot').'/../images/service/medium').'/'.$model->image1);
				}
				if($model->img2){
					$model->img2->saveAs(realpath(Yii::getPathOfAlias('webroot').'/../images/service').'/'.$model->image2);
					$ih = new CImageHandler();
					Yii::app()->ih->load(realpath(Yii::getPathOfAlias('webroot').'/../images/service').'/'.$model->image2)->
					thumb('300', false)->
					save(realpath(Yii::getPathOfAlias('webroot').'/../images/service/medium').'/'.$model->image2);
				}
			}
				$this->redirect(array('index'));
		}
		
		$counts=Services::getCounts();
		$this->render('update',array(
			'model'=>$model,
			'counts'=>$counts,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($show=null)
	{
		$services=Services::getServices($show);
		$counts=Services::getCounts();
		$this->render('index',array(
			'services'=>$services,
			'counts'=>$counts,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Services('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Services']))
			$model->attributes=$_GET['Services'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Services the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Services::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Services $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='services-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
