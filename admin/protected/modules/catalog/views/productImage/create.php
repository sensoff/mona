<?php
/* @var $this ProductImageController */
/* @var $model ProductImage */
$this->breadcrumbs=array(
		$prod->name=>CHtml::normalizeUrl(array('/catalog/product/view', 'id'=>$prod->id)),
		'новая фотография',
);
?>

<div class="statistics">Новое фото</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>