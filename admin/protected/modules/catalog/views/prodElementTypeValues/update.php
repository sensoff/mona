<?php
/* @var $this ProdElementTypeValuesController */
/* @var $model ProdElementTypeValues */
?>
<div class="conteiner">
				<div class="left2">
				<?php $this->widget('application.components.leftMenu', array('menu'=>CatalogModule::leftMenu())); ?>
				<?php $this->widget('application.components.leftMenu', array('menu'=>CatalogModule::getCategoryMenu())); ?>
				</div>
				<div class="center2">
<h1>Редактирование значения <?php echo $model->value; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>