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
<h1>Новое значение для <?php echo $type->lable?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>