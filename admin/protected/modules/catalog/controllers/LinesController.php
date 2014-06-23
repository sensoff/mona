<?php

class LinesController extends Controller
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
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
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
	public function actionView($id, $show=null)
	{
		$prods=Product::getProducts($id, $show);
		$counts=Product::getCounts($id);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'prods'=>$prods,
			'counts'=>$counts,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($categoryid)
	{
		$model=new Lines;
		$model->category_id=$categoryid;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Lines']))
		{
			$model->attributes=$_POST['Lines'];
			$model->img=CUploadedFile::getInstance($model,'image');
			if($model->img){
				$length = 15;
				$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
				shuffle($chars);
				$name = implode(array_slice($chars, 0, $length));
				$model->image=$name.'.'.$model->img->getExtensionName();
			}
			if($model->save()){
				if($model->img){
					$model->img->saveAs(realpath(Yii::getPathOfAlias('webroot').'/../images/catalog').'/'.$model->image);
				}
				$this->redirect(array('/catalog/category/view','id'=>$categoryid));
			}
		}
		$counts=Lines::getCounts($categoryid);
		$this->render('create',array(
			'model'=>$model,
				'counts'=>$counts,
				'id'=>$categoryid,
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
		$oldimg=$model->image;
		if(isset($_POST['Lines']))
		{
			$model->attributes=$_POST['Lines'];
			$model->img=CUploadedFile::getInstance($model,'image');
			if($model->img){
				$length = 15;
				$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
				shuffle($chars);
				$name = implode(array_slice($chars, 0, $length));
				$model->image=$name.'.'.$model->img->getExtensionName();
			} else {
				$model->image=$oldimg;
			}
			if($model->save()){
				if($model->img){
					$model->img->saveAs(realpath(Yii::getPathOfAlias('webroot').'/../images/catalog').'/'.$model->image);
				}
				$this->redirect(array('/catalog/category/view','id'=>$model->category_id));
			}
		}
		$counts=Lines::getCounts($model->category_id);
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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Lines');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Lines('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Lines']))
			$model->attributes=$_GET['Lines'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Lines the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Lines::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Lines $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='lines-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
