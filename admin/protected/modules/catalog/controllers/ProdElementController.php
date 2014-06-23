<?php

class ProdElementController extends Controller
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
				'actions'=>array('index','view','AjaxUpdate'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
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
	public function actionCreate($prodid=0)
	{
		$model=new ProdElement;
		$product=Product::model()->findByPk($prodid);
		if(!$product){
			$this->render('application.views.site.error2', array('message'=>'продукта не существует'));
		}
		$model->product_id=$product->id;
		$values=$product->getDropElemsNonOnProduct();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProdElement']))
		{
			$model->attributes=$_POST['ProdElement'];
			if($model->save())
				$this->redirect(array('product/view','id'=>$model->product_id));
		}

		$this->render('create',array(
			'model'=>$model,
			'values'=>$values,
			
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
		$product=Product::model()->findByPk($model->product_id);
		if(!$product){
			$this->render('application.views.site.error2', array('message'=>'продукта не существует'));
		}
		$values=$product->getDropElemsNonOnProduct();
		$values[$model->prod_element_type_id]=$model->elementtype->lable;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProdElement']))
		{
			$model->attributes=$_POST['ProdElement'];
			if($model->save())
				$this->redirect(array('product/view','id'=>$model->product_id));
		}

		$this->render('update',array(
			'model'=>$model,
			'values'=>$values,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		$nid=$model->product_id;
		$model->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(array('product/view','id'=>$nid));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ProdElement');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProdElement('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProdElement']))
			$model->attributes=$_GET['ProdElement'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=ProdElement::model()->with('product')->with('elementtype')->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='prod-element-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/*
	 * возвращаеммый массив
	 * status 'ok' или 'fail'
	 * id - номер строки с которой пришли данные
	 * newvalue = новое значение устанавливаемое в текст
	 * selectid Только для дропдауна ид который надо выделить
	 */
	
	function actionAjaxUpdate(){
		if(isset($_POST['name']) && isset($_POST['value']) && isset($_POST['elemid'])){
			$values=explode('_', $_POST['name']);
			$criteria=new CDbCriteria();
			$criteria->addCondition('product_id= :prodid');
			$criteria->addCondition('prod_element_type_id= :typeid');
			$criteria->params=array(':prodid'=>$values[0], ':typeid'=>$values[1]);
			$model=ProdElement::model()->with('elementtype')->find($criteria);
			if($model){
				if($model->elementtype->input_type=='Select'){
					$value=ProdElementTypeValues::model()->findByPk($_POST['value']);
					if(!$value){
						$res['status']='fail';
						$res['id']=$_POST['elemid'];
						echo CJSON::encode($res);
						return null;
					}
				}
				$model->value=$_POST['value'];
				if($model->save()){
					$res['status']='ok';
					$res['id']=$_POST['elemid'];
					if($value){
						$res['newvalue']=$value->value;
						$res['selectid']=$_POST['value'];
					} else {
						$res['newvalue']=$_POST['value'];
					}
				} else {
					$res['status']='fail';
					$res['id']=$_POST['elemid'];
				}
			} else {
				$res['status']='fail';
				$res['id']=$_POST['elemid'];
			}
			
		} else {
			$res['status']='fail';
			$res['id']=$_POST['id'];
		}
		echo CJSON::encode($res);
	}
}
