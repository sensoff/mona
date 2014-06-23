<?php

class CategoryController extends Controller
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
				'actions'=>array('delete'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($catalog=1)
	{
		$model=new Category;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$catalog=Catalog::model()->findByPk($catalog);
		if(!$catalog){
			$this->render('application.views.site.error2', array('message'=>'родительская категория не существует'));
		}
		//$categories=Category::getCategories($catalog->id);
		$catalogs=Catalog::getAllCatalogs();
		$selCatalog=Catalog::getSelectedCatalog($catalogs, $catalog->id);
		$model->catalog_id=$catalog->id;
		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
			$model->img1=CUploadedFile::getInstance($model,'image1');
			if($model->img1){
				$length = 15;
				$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
				shuffle($chars);
				$name = implode(array_slice($chars, 0, $length));
				$model->image1=$name.'.'.$model->img1->getExtensionName();
			}
			/*if(isset($model->name_lang1)){
				if(empty($model->name_lang2)){
					$model->name_lang2=$model->name_lang1;
				}
				if(empty($model->name_lang3)){
					$model->name_lang3=$model->name_lang1;
				}
			} */

			if($model->save()){
				if($model->img1){
					$model->img1->saveAs(realpath(Yii::getPathOfAlias('webroot').'/../images/catalog').'/'.$model->image1);
					$ih = new CImageHandler();
					Yii::app()->ih->load(realpath(Yii::getPathOfAlias('webroot').'/../images/catalog').'/'.$model->image1)->
					thumb('900', false)->
					save(realpath(Yii::getPathOfAlias('webroot').'/../images/catalog/big').'/'.$model->image1);
					Yii::app()->ih->load(realpath(Yii::getPathOfAlias('webroot').'/../images/catalog').'/'.$model->image1)->
					thumb('700', false)->
					save(realpath(Yii::getPathOfAlias('webroot').'/../images/catalog/medium').'/'.$model->image1);
				}
				$this->redirect(array('/catalog/category/index', 'catalog'=>$selCatalog->id));
			}
		}

		$counts=Category::getCounts( $catalog->id );
		$this->render('create',array(
			'model'=>$model,
			//'categories'=>$categories,
			//'catalog'=>$catalog,
			'selCatalog'=>$selCatalog,
			'catalogs'=>$catalogs,
			'counts'=>$counts,
		));
	}


	public function actionView($id, $show=null)
	{
		$prods=Product::getProducts($id, $show);
		$counts=Product::getCounts($id);
		$category=Category::model()->with('catalog')->findByPk($id);
		if($category){
			$categorys=Category::getCategories($category->catalog->id);
			$selCategory=Category::getSelectedCategoru($categorys, $category->id);
			$leftMenu=Product::getLeftMenu($categorys, $selCategory, $counts);
			$this->render('view',array(
				'model'=>$category,
				'prods'=>$prods,
				'catalog'=>$category->catalog,
				'leftMenu'=>$leftMenu,
			));
		} else {
			$this->redirect(array('/catalog/category/index', 'ebaldos'=>1));
		}
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


		$oldimg1=$model->image1;

		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
			$model->img1=CUploadedFile::getInstance($model,'image1');
			if($model->img1){
				$length = 15;
				$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
				shuffle($chars);
				$name = implode(array_slice($chars, 0, $length));
				$model->image1=$name.'.'.$model->img1->getExtensionName();
			} else {
				$model->image1=$oldimg1;
			}
			if(isset($model->name_lang1)){
				if(empty($model->name_lang2)){
					$model->name_lang2=$model->name_lang1;
				}
				if(empty($model->name_lang3)){
					$model->name_lang3=$model->name_lang1;
				}
			}

			if($model->save()){
				if($model->img1){
					$model->img1->saveAs(realpath(Yii::getPathOfAlias('webroot').'/../images/catalog').'/'.$model->image1);
					$ih = new CImageHandler();
					Yii::app()->ih->load(realpath(Yii::getPathOfAlias('webroot').'/../images/catalog').'/'.$model->image1)->
					thumb('300', false)->
					save(realpath(Yii::getPathOfAlias('webroot').'/../images/catalog/medium').'/'.$model->image1);
				}
				$this->redirect(array('/catalog/category/index', 'catalog'=>$model->catalog_id));
			}
		}
		$counts=Category::getCounts($model->catalog_id);
		$catalogs=Catalog::getAllCatalogs();
		$selCatalog=Catalog::getSelectedCatalog($catalogs, $model->catalog_id);
		$this->render('update',array(
			'model'=>$model,
			'counts'=>$counts,
			'catalogs'=>$catalogs,
			'selCatalog'=>$selCatalog,
		));
	}

	function actionIndex($catalog=1, $show=null){
		$catalogs = Catalog::getAllCatalogs();
		$selCatalog=Catalog::getSelectedCatalog($catalogs, $catalog);

		if (!empty( $selCatalog ) ){
			$counts=Category::getCounts( $selCatalog->id );
			$categories=Category::getCategories($selCatalog->id, $show);
		} else {
			$counts=Category::getCounts( 0 );
			$categories=Category::getCategories(0, $show);
		}


		$this->render('index',array(
				'categories'=>$categories,
				'counts'=>$counts,
				'catalogs'=>$catalogs,
				'selCatalog'=>$selCatalog,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$category=$this->loadModel($id);
		$catalogid=$category->catalog_id;
		$category->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(array('/catalog/category/index', 'catalog'=>$catalogid));
	}

	/**
	 * Lists all models.
	 */

	/**
	 * Manages all models.
	 */

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Category::model()->with('catalog')->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
