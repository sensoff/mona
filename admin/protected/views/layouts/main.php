<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="language" content="en" />
  <meta name="robots" content="none" />
	<link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl?>/images/favi.ico">
	<!-- blueprint CSS framework -->

	<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl?>/css/main.css" type="text/css" media="screen, projection">
	<script src="http://localhost/jquery.min.js"></script>
	<script type="text/javascript" defer src="js/select_language.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="wrapper">

<header>
		<div class="left_sidebar">
			<div class="logo">
				<!-- <img alt="logo" src="../images/logo.png" style="height: 50px; margin-top: 20px;" /> -->
			</div>
		</div>
		<div class="center">
			<div class="conteiner">
				<div id="top_menu">
						<?php
						$blogact=0;
						$cataction=0;
						$seract=0;
						$filesaction=0;
						$slideract=0;
						$comments_act = 0;
						$orders_act = 0;
						$slideract = 0;
						if(isset(Yii::app()->controller->module->id)){
							//catalog
							if(Yii::app()->controller->module->id=='catalog'){
								$cataction=1;
							}
							//services
							if(Yii::app()->controller->module->id=='services'){
								$seract=1;
							}
							// comments
							if(Yii::app()->controller->module->id=='comments') {
								$comments_act = 1;
							}

							// orders
							if(Yii::app()->controller->module->id=='orders') {
								$orders_act = 1;
							}

							//blog
							if(Yii::app()->controller->module->id=='blog'){
								$blogact=1;
							}
						} else {
							//files
							if(Yii::app()->controller->id=='files'){
								$filesaction=1;
							}
							//slider
							if(Yii::app()->controller->id=='slider'){
								$slideract=1;
							}
						}
						$this->widget('zii.widgets.CMenuAdmin', array(
			'items'=>array(
				array('label'=>'Заказы', 'url'=>array('/orders/orders/index'),	'itemOptions'=>array('class'=>'orders block btn'), 'active'=>$orders_act),
				array('label'=>'Каталоги', 'url'=>array('/catalog/category/index'), 'itemOptions'=>array('class'=>'catalog block btn'), 'active'=>$cataction),
				array('label'=>'Новости', 'url'=>array('/blog/article/index'),
				'active'=>$blogact,
				'itemOptions'=>array('class'=>'articles block btn')),
				//array('label'=>'Услуги', 'url'=>array('/services/services/index'), 'itemOptions'=>array('class'=>'news block btn'), 'active'=>$seract),
				//array('label'=>'Файлы', 'url'=>array('/files/index'), 'itemOptions'=>array('class'=>'filemanager block btn'), 'active'=>$filesaction),
				array('label'=>'Отзывы', 'url'=>array('/comments/comments/index'),	'itemOptions'=>array('class'=>'comments block btn'), 'active'=>$comments_act),
				//array('label'=>'Слайдер', 'url'=>array('/slider/index'), 'itemOptions'=>array('class'=>'slider block btn'), 'active'=>$slideract),
				array('label'=>'Файлы', 'url'=>array('/files/index'), 'itemOptions'=>array('class'=>'filemanager block btn'), 'active'=>$filesaction),
				array('label'=>'Слайдер', 'url'=>array('/slider/index'), 'itemOptions'=>array('class'=>'slider block btn'), 'active'=>$slideract),
				array('label'=>'Настройки', 'url'=>array('/site/config'), 'itemOptions'=>array('class'=>'settings block btn')),
				array('label'=>'Выход', 'url'=>array('/site/logout'), 'itemOptions'=>array('class'=>'logout block btn')),
			),
		)); ?>
				</div>
			</div>
		</div>
	</header>
	<?php /*?>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
*/?>
	<div id="content">
		<?php echo $content; ?>
	</div>

</div><!-- page -->
<div id="footer">
	Alice &copy; 2013 Версия 0.8
</div><!-- footer -->
</body>
</html>
