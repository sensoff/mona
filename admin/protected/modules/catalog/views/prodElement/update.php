<?php
/* @var $this ProdElementController */
/* @var $model ProdElement */

?>
<div class="conteiner">
				<div class="left2">
				<?php $this->widget('application.components.leftMenu', array('menu'=>CatalogModule::leftMenu())); ?>
				<?php $this->widget('application.components.leftMenu', array('menu'=>CatalogModule::getCategoryMenu())); ?>
				</div>
				<div class="center2">
<h1>Update ProdElement <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'values'=>$values)); ?>
</div>
</div>