<?php
/* @var $this CategoryController */
/* @var $model Category */

?>
<div class="conteiner">
			<div class="left_sidebar">
				<div class="page_title">
					Каталог
				</div>
			</div>
			<div class="center">
				<div class="breadcrumbs">
				<?php 	$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>array('Каталоги'=>CHtml::normalizeUrl(array('/catalog/category/index')),
					'Редактирование каталога'=>CHtml::normalizeUrl(array('/catalog/category/update', 'id'=>$model->id)),
				),
		)); ?>
				</div>
			</div>
		</div>
<div class="conteiner">
<div class="left_sidebar">
			<?php $this->renderPartial('/default/_leftSide', array('selCatalog'=>$selCatalog, 'catalogs'=>$catalogs, 'counts'=>$counts))?>
			<?php
					//$this->renderPartial("application.views.site._langMenu", array('langs'=>Lang::getLangs()));
				?>
	<div class="product_about">
		<div class="image">
			<img alt="" src="../images/catalog/medium/<?php echo $model->image1; ?>" />
		</div>
	</div>
	<div class="product_name">
		<?php echo $model->name_lang1; ?>
	</div>


</div>


<?php echo $this->renderPartial('_form', array('model'=>$model, 'act'=>'u')); ?>

		</div>
