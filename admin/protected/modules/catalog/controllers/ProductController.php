<?php

class ProductController extends Controller
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
						'actions'=>array('index','view', 'AjaxDates', 'AjaxImages', 'AjaxUpdate'),
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
		$product=Product::model()->findByPk($id);
		$this->render('view',array(
				'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($cid)
	{
		$model=new Product;

		$category=Category::model()->with('catalog')->findByPk($cid);
		if(!$category){
			$this->redirect(array('/catalog/category/index', 'ebaldos'=>1));
		}

		$categorys=Category::getCategories($category->catalog->id);
		$selcategory=Category::getSelectedCategoru($categorys, $category->id);
		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
			$model->img=CUploadedFile::getInstance($model,'image');
			if($model->img){
				$name=$model->url;
				$model->image=rand(0, 100000000).'.'.$model->img->getExtensionName();
			}
			$model->category_id=$category->id;
			$model->product_type_id=1;
			if(empty($model->date_create)){
				$model->date_create=new CDbExpression('NOW()');
			}
			if($model->save()){
				if($model->img){
					$model->img->saveAs(realpath(Yii::getPathOfAlias('webroot').'/../images/products').'/'.$model->image);
					$ih = new CImageHandler();
					Yii::app()->ih->load(realpath(Yii::getPathOfAlias('webroot').'/../images/products').'/'.$model->image)->
					thumb('580', false)->
					save(realpath(Yii::getPathOfAlias('webroot').'/../images/products/medium').'/'.$model->image);
					Yii::app()->ih->load(realpath(Yii::getPathOfAlias('webroot').'/../images/products').'/'.$model->image)->
					thumb('200', false)->
					save(realpath(Yii::getPathOfAlias('webroot').'/../images/products/small').'/'.$model->image);

				}
				$this->redirect(array('/catalog/category/view','id'=>$model->category_id));

			}
		}
		$category=Category::model()->findByPk($cid);
		$counts=Product::getCounts($cid);
		$leftMenu=Product::getLeftMenu($categorys, $category, $counts);
		$model->top=1;
		 $this->render('create',array(
				'model'=>$model,
				'category'=>$selcategory,
		 		'cat'=>$category,
				'catalog'=>$category->catalog,
				'leftMenu'=>$leftMenu,
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
		$category=Category::model()->with('catalog')->findByPk($model->category_id);
		if(!$category){
			$this->redirect(array('/catalog/category/index', 'ebaldos'=>1));
		}
		$categorys=Category::getCategories($category->catalog_id);
		$selcategory=Category::getSelectedCategoru($categorys, $category->id);

		if(isset($_POST['Product']))
		{
			//echo var_dump($_POST);
			$lastimage=$model->image;
			$model->attributes=$_POST['Product'];
			$model->img=CUploadedFile::getInstance($model,'image');
			if($model->img){
				$name=$model->url;
				$model->image=$name.'.'.$model->img->getExtensionName();
			} else {
				$model->image=$lastimage;
			}
			if($model->save()){
				if($model->img){
					$model->img->saveAs(realpath(Yii::getPathOfAlias('webroot').'/../images/products').'/'.$model->image);
					$ih = new CImageHandler();
					Yii::app()->ih->load(realpath(Yii::getPathOfAlias('webroot').'/../images/products').'/'.$model->image)->
					thumb('300', false)->
					save(realpath(Yii::getPathOfAlias('webroot').'/../images/products/medium').'/'.$model->image);
					Yii::app()->ih->load(realpath(Yii::getPathOfAlias('webroot').'/../images/products').'/'.$model->image)->
					thumb('300', false)->
					save(realpath(Yii::getPathOfAlias('webroot').'/../images/products/small').'/'.$model->image);
					$criteria=new CDbCriteria();
					$criteria->addCondition('prod_id = :pid');
					$criteria->addCondition('image_name = :in');
					$criteria->params=array(':pid'=>$model->id, 'in'=>$lastimage);
					$image=ProductImage::model()->find($criteria);
					if(!$image){
						$image=new ProductImage();
						$image->prod_id=$model->getPrimaryKey();
					}
				}
			}
		}
		$counts=Product::getCounts($model->category_id);
		$images=ProductImage::getProductImage($model->id);
		$category=Category::model()->findByPk($model->category_id);
		$leftMenu=Product::getLeftMenu($categorys, $category, $counts);
		$this->render('update',array(
					'model'=>$model,
					'images'=>$images,
					'category'=>$category,
					'leftMenu'=>$leftMenu,

					'catalog'=>$category->catalog,
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
		$id=$model->category_id;
			$model->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(array('/catalog/category/view', 'id'=>$id));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($page=1, $category=0, $local=null, $show=null)
	{
		$count=Product::getCounts();
		$link['category']=$category;
		$link['page']=$page;
		$link['local']=$local;
		$link['show']=$show;
		$products=Product::getProducts($page, $category, $local, $show);
		$this->render('index',array(
				'products'=>$products[0],
				'link'=>$link,
				'page'=>$page,
				'prodcount'=>$products[1],
				'count'=>$count,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Product('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Product']))
			$model->attributes=$_GET['Product'];

		$this->render('admin',array(
				'model'=>$model,
		));
	}

	function actionAjaxDates(){
		if(isset($_POST['type'])){
			if($_POST['type']!="0"){
				echo $this->renderPartial('_dates');
			} else {
				echo " ";
			}
		} else {

		}
	}

	function actionAjaxImages(){
		if(isset($_POST['id'])){
			$id=explode('image_', $_POST['id']);
			if(is_numeric($id[1])){
				echo $this->renderPartial('_dopimage', array('num'=>($id[1]+1)));
			}
		}
	}

	function actionAjaxUpdate(){
		if(isset($_POST['name']) && isset($_POST['value']) && isset($_POST['elemid'])){
			$res['id']=$_POST['elemid'];
			$values=explode('_', $_POST['name']);
			$model=Product::model()->findByPk($values[0]);
			if($model){
				switch ($_POST['elemid']){
					case "201":
						$model->name=$_POST['value'];
						break;
					case "202":
						$model->description=$_POST['value'];
						break;
					case "203":
						$categoris=Category::getCategories();
						$save=0;
						for($i=0;$i<count($categoris);$i++){
							if($categoris[$i]->id==$_POST['value']){
								$save=1;
								$newvalue=$categoris[$i]->name;
								$select=$_POST['value'];
							}
						}
						if($save==1){
							$model->category_id=$_POST['value'];

						}
						break;
					case "204":
						$save=0;
						if($_POST['value']=="true"){
							$newvalue="да";
							$model->top=1;
							$save=1;
						}
						if($_POST['value']=="false"){
							$newvalue="нет";
							$model->top=0;
							$save=1;
						}
						if($save==1){

							$select=$_POST['value'];
						}

						break;
					case "205":
				$save=0;
						if($_POST['value']=="true"){
							$newvalue="нет";
							$model->local=1;
							$save=1;
						}
						if($_POST['value']=="false"){
							$newvalue="да";
							$model->local=1;
							$save=1;
						}
						if($save==1){

							$select=$_POST['value'];
						}
				}
				if($model->local){
					$model->date_from=null;
					$model->date_to=null;
				}
				if($model->save()){
					if(isset($newvalue)){
						$res['newvalue']=$newvalue;
					} else {
						$res['newvalue']=$_POST['value'];
					}
					if(isset($select)){
						$res['selectid']=$select;
					}
					$res['status']='ok';
					echo CJSON::encode($res);
					return null;
				}
			}
		}
		$res['status']='fail';
		echo CJSON::encode($res);
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Product::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}


