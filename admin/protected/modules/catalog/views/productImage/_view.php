<?php
/* @var $this ProductImageController */
/* @var $data ProductImage */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prod_id')); ?>:</b>
	<?php echo CHtml::encode($data->prod_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_name')); ?>:</b>
	<?php echo CHtml::encode($data->image_name); ?>
	<br />


</div>