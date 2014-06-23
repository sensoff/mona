<?php
/* @var $this ArticleController */
/* @var $model Article */
?>
<div class="conteiner">
			<div class="left_sidebar">
				<div class="page_title">
					Статьи
				</div>
			</div>
			<div class="center">
				<div class="breadcrumbs">
					<?php 	$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>array('Статьи'=>CHtml::normalizeUrl(array('/blog/article/index')),
							'Редактирование статьи'=>CHtml::normalizeUrl(array('/blog/article/update', 'id'=>$model->id)),
				),
		)); ?>
				</div>
			</div>
		</div>
		<div class="conteiner">
			<div class="left_sidebar">
				<?php 
					$this->renderPartial("application.views.site._langMenu", array('langs'=>Lang::getLangs()));
				?>
			</div>
			<div class="center">

<?php echo $this->renderPartial('_form', array('model'=>$model, 'act'=>'u')); ?>

</div>
			</div>
		</div>
