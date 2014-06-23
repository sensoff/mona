<?php

class ProductImageController extends Controller
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
	public function actionView($id)
	{	
		$model=ProductImage::model()->with('prod')->findByPk($id);
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($prodid, $alias, $name)
	{
		$model=new ProductImage;
		$prod=Product::model()->findByPk($prodid);
		if(!$prod){
			$this->render('application.views.site.error2', array('message'=>'продукт не существует'));
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->show=1;
		if(isset($_POST['ProductImage']))
		{
			$model->attributes=$_POST['ProductImage'];
			$model->img=CUploadedFile::getInstance($model,'image_name');
			$save=0;
			if($model->img){
				$stop=0;
				while ($stop==0){
					$rand=rand(0, 10000);
					$nameimg=$alias.$rand;
					$criteria=new CDbCriteria();
					$criteria->addCondition('image_name = name');
					$criteria->params=array(':name'=>$nameimg);
					$count=ProductImage::model()->count($criteria);
					if($count==0){
						$stop=1;
					}
				}
				$model->image_name=$nameimg.'.'.$model->img->getExtensionName();
				$save=1;
			} 
			$model->prod_id=$prodid;
			$model->name=$name;
			$model->show=1;
			if($model->save()){
				if($save==1){
					$model->img->saveAs(realpath(Yii::getPathOfAlias('webroot').'/../images/products').'/'.$model->image_name);
					$ih = new CImageHandler();
					Yii::app()->ih->load(realpath(Yii::getPathOfAlias('webroot').'/../images/products').'/'.$model->image_name)->
					thumb('100', false)->
					save(realpath(Yii::getPathOfAlias('webroot').'/../images/products/small').'/'.$model->image_name);
					$ih = new CImageHandler();
					Yii::app()->ih->load(realpath(Yii::getPathOfAlias('webroot').'/../images/products').'/'.$model->image_name)->
					thumb('960', false)->
					save(realpath(Yii::getPathOfAlias('webroot').'/../images/products/big').'/'.$model->image_name);
				}
				$this->redirect(array('/catalog/product/update','id'=>$prod->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'prod'=>$prod,
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
		$previmg=$model->image_name;
		$product=Product::model()->findByPk($model->prod_id);
		$save=null;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductImage'])){
			$lastfoto=$model->image_name;
			$model->attributes=$_POST['ProductImage'];
			$model->img=CUploadedFile::getInstance($model,'image_name');
			if($model->img!=null){
				$stop=0;
				while ($stop==0){
					$rand=rand(0, 10000);
					$nameimg=$product->url.$rand;
					$criteria=new CDbCriteria();
					$criteria->addCondition('image_name = name');
					$criteria->params=array(':name'=>$nameimg);
					$count=ProductImage::model()->count($criteria);
					if($count==0){
						$stop=1;
					}
				}
				$model->image_name=$nameimg.'.'.$model->img->getExtensionName();
				$save=1;
			} else {
				$model->image_name=$lastfoto;
			}
			if($model->save()){
				if($save){
					$model->img->saveAs(realpath(Yii::getPathOfAlias('webroot').'/../images/products').'/'.$model->image_name);
					$ih = new CImageHandler();
					Yii::app()->ih->load(realpath(Yii::getPathOfAlias('webroot').'/../images/products').'/'.$model->image_name)->
					thumb('100', false)->
					save(realpath(Yii::getPathOfAlias('webroot').'/../images/products/small').'/'.$model->image_name);
					$ih = new CImageHandler();
					Yii::app()->ih->load(realpath(Yii::getPathOfAlias('webroot').'/../images/products').'/'.$model->image_name)->
					thumb('960', false)->
					save(realpath(Yii::getPathOfAlias('webroot').'/../images/products/big').'/'.$model->image_name);
				} else {
					$model->image_name=$previmg;
				}
				$this->redirect(array('/catalog/product/update','id'=>$model->prod_id));
			}
		}
		$counts=Product::getCounts($product->category_id);
		$this->render('update',array(
			'model'=>$model,
			'counts'=>$counts,
			'product'=>$product,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=ProductImage::model()->findByPk($id);
		$prodid=$model->prod_id;
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/catalog/product/update', 'id'=>$prodid));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ProductImage');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProductImage('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductImage']))
			$model->attributes=$_GET['ProductImage'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ProductImage the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ProductImage::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ProductImage $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-image-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
