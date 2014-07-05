<?php

class SiteController extends Controller
{

	public $firm='';
	public $ynp='';
	public $vk='';
	public $odn='';
	public $fb='';
	public $instagram = '';
	public $phone='';
	public $url='';
	public $email='';
	public $slider_text='';
	public $slogan='';

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
		$params = Params::getParams();
		$slides = Slide::getSlides();
		$comments = Comments::getComment();
		$news = Article::getLastArticle();
		$products = Product::getProducts();
		$categories = Category::getCategories();
		$this->firm = $params[0]->value;
		$this->ynp = $params[1]->value;
		$this->phone = $params[2]->value;
		$this->email = $params[3]->value;
		$this->vk = $params[4]->value;
		$this->odn = $params[5]->value;
		$this->fb = $params[6]->value;
		$this->instagram = $params[7]->value;
		$this->slogan = $params[8]->value;
		$this->slider_text = $params[9]->value;

		$this->render(
			'index',
			array(
				'slides'=>$slides,
				'params'=>$params,
				'comment'=>$comments[0],
				'news'=>$news[0],
				'categories'=>$categories,
				'products'=>$products
			)
		);
	}
	public function actionComments()
	{
		$comments = Comments::getComments(1);
		$params = Params::getParams();
		$slides = Category::getMasters();
		$this->firm = $params[0]->value;
		$this->ynp = $params[1]->value;
		$this->phone = $params[2]->value;
		$this->email = $params[3]->value;
		$this->vk = $params[4]->value;
		$this->odn = $params[5]->value;
		$this->fb = $params[6]->value;
		$this->instagram = $params[7]->value;
		$this->slogan = $params[8]->value;
		$this->slider_text = $params[9]->value;

		$this->render('comments', array('slides'=>$slides, 'params'=>$params, 'comments'=>$comments));
	}

	public function actionCatalog($url)
	{
		$comments = Comments::getComments();
		$params = Params::getParams();
		$slides = Category::getMasters();
		$category=Category::getByAlias($url);
		$photos = Product::getProducts($category->id);
		$this->firm = $params[0]->value;
		$this->ynp = $params[1]->value;
		$this->phone = $params[2]->value;
		$this->email = $params[3]->value;
		$this->vk = $params[4]->value;
		$this->odn = $params[5]->value;
		$this->fb = $params[6]->value;
		$this->instagram = $params[7]->value;
		$this->slogan = $params[8]->value;
		$this->slider_text = $params[9]->value;
		$this->url = $url;

		$this->render('catalog', array('photos'=>$photos, 'slides'=>$slides, 'params'=>$params, 'comments'=>$comments));
	}

	public function actionGetCatalog()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//
		$catalog="[";

		$slides=Category::getMasters();

		for($i=0; $i<count($slides); $i++) {
				$catalog = $catalog.'{"id":"'.$slides[$i]->url.'","title":"'.$slides[$i]->name_lang1.'","images":[';
				$images=Product::getProducts5($slides[$i]->id);
				for($j=0; $j<count($images); $j++) {
						$catalog = $catalog.'{"img":"'.$images[$j]->image.'","title":"'.$images[$j]->name_lang1.'"}';
						if ($j !== count($images)-1) {
								$catalog = $catalog.",";
						}
				}
				$catalog = $catalog."]}";
				if ($i !== count($slides)-1) {
						$catalog = $catalog.",";
				}
		}
		$catalog = $catalog."]";
		echo  $catalog;
		return 0;
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

	public function actionGetComments() {
		$comments = Comments::getComments(1);
		$json = "[";
		for($i=0; $i<count($comments); $i++) {
				$json = $json.'{"user":"'.$comments[$i]->user.'","comment":"'.$comments[$i]->comment.'",';
				$json = $json.'"date":"'.$comments[$i]->date.'","rating":"'.$comments[$i]->rating.'"}';
				if ($i !== count($comments)-1) {
						$json = $json.",";
				}
		}
		echo CJSON::encode($comments);
		return 0;
	}

	public function actionGetNews($position = 0) {
		$news = Article::getLastArticle($position);
		$next = Article::getLastArticle($position + 1);
		if(count($news) > 0) {
			$news[0]->id = $position;
			if (count($next) > 0) {
				$news[0]->alias = true;
			} else {
				$news[0]->alias = false;
			}
			echo CJSON::encode($news);
		} else {
			echo 'error';
		}

		return 0;
	}

	public function actionAddComment() {
			if(isset($_POST['Comment'])) {
					$comment = new Comments();
					$comment->user = $_POST['Comment']['user'];
					$comment->comment = $_POST['Comment']['comment'];
					$comment->rating = $_POST['Comment']['rating'];
					$comment->date = date("Y-m-d");
					$comment->product = $_POST['Comment']['img'];
					$comment->product = $_POST['Comment']['price'];
					$comment->approve = 0;
					if ($comment->save()) {
						echo CJSON::encode(array('res' => 'ok'));
						return 0;
					} else {
						echo CJSON::encode(array('res' => 'no'));
						return 0;
					}
			} else {
					echo CJSON::encode($_POST);
			  	return 0;
			}
	}

	public function actionAddOrder() {
			if(isset($_POST['Order'])) {
					$order = new Orders();
					$order->user = $_POST['Order']['user'];
					$order->phone = $_POST['Order']['pre'].$_POST['Order']['phone'];
					$order->date = date("Y-m-d");
					$order->approve = 0;
					if ($order->save()) {
						echo CJSON::encode(array('res' => 'ok'));
						return 0;
					} else {
						echo CJSON::encode(array('res' => 'no'));
						return 0;
					}
			} else {
					echo CJSON::encode($_POST);
			  	return 0;
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


}
