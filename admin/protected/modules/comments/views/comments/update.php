<?php
/* @var $this CategoryController */
/* @var $model Category */

?>
<div class="conteiner">
	<div class="left_sidebar">
		<div class="page_title">
			Отзывы
		</div>
	</div>
	<div class="center">
		<div class="breadcrumbs">
				<?php 	$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>array('Отызвы'=>CHtml::normalizeUrl(array('/comments/comments/index')),
					'Ответ на отзыв'=>CHtml::normalizeUrl(array('/comments/comments/update', 'id'=>$model->id)),
				),
			)); ?>
		</div>
	</div>
</div>
<div class="conteiner">
	<div class="left_sidebar">
		<?php $this->renderPartial('/default/_leftSide', array('comments'=>$comments, 'counts'=>$counts))?>
	</div>
	<div class="center">
		<?php echo $this->renderPartial('_form', array('model'=>$model, 'act'=>'u')); ?>
	</div>
</div>



