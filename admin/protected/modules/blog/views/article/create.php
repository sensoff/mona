<?php
/* @var $this ArticleController */
/* @var $model Article */
?>
<div class="conteiner">
	<div class="left_sidebar">
		<div class="page_title">
			Новости
	  </div>
	</div>

	<div class="center">
		<div class="breadcrumbs">
				<?php 	$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>array('Все новости'=>CHtml::normalizeUrl(array('/blog/article/index')),
					'Новая новость'=>CHtml::normalizeUrl(array('/blog/article/create', 'id'=>$model->id)),
				),
			)); ?>
		</div>
	</div>
</div>
<div class="conteiner">
	<div class="left_sidebar">
  	<div class="stat">
			<a href="<?php echo CHtml::normalizeUrl(array('/blog/article/index', 'blogid'=>1))?>" class="line block2 btn">
				<span class="name">
					Все новости:
				</span>
				<span class="value">
					<?php echo $counts['all']?>
				</span>
			</a>
			<a href="<?php echo CHtml::normalizeUrl(array('/blog/article/index', 'blogid'=>1, 'show'=>0))?>" class="line block2 btn">
				<span class="name">
					Неопубликованные новости:
				</span>
				<span class="value">
					<?php echo $counts['nshow']?>
				</span>
			</a>
			<a href="<?php echo CHtml::normalizeUrl(array('/blog/article/index', 'blogid'=>1, 'show'=>1))?>" class="line block2 btn">
				<span class="name">
					Опубликованные новости:
				</span>
				<span class="value">
					<?php echo $counts['show']?>
				</span>
			</a>
		</div>
	</div>
	<div class="center">
		<?php echo $this->renderPartial('_form', array('model'=>$model, 'blogid'=>$blogid, 'act'=>'c')); ?>
	</div>
</div>
