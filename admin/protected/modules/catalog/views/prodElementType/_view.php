<?php
/* @var $this ProdElementTypeController */
/* @var $data ProdElementType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->product_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ed_izmerenia')); ?>:</b>
	<?php echo CHtml::encode($data->ed_izmerenia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lable')); ?>:</b>
	<?php echo CHtml::encode($data->lable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('input_type')); ?>:</b>
	<?php echo CHtml::encode($data->input_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('input_values')); ?>:</b>
	<?php echo CHtml::encode($data->input_values); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>