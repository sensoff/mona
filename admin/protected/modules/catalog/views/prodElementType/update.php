<?php
/* @var $this ProdElementTypeController */
/* @var $model ProdElementType */
?>
<div class="conteiner">
				<div class="left2">
				<?php $this->widget('application.components.leftMenu', array('menu'=>CatalogModule::leftMenu())); ?>
				<?php $this->widget('application.components.leftMenu', array('menu'=>CatalogModule::getCategoryMenu())); ?>
				</div>
				<div class="center2">
<h1>Update ProdElementType <?php echo $model->lable; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>