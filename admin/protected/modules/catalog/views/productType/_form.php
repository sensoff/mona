<?php
/* @var $this ProductTypeController */
/* @var $model ProductType */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-type-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="conteiner">
	<div class="left">
	<div class="form_title">
		<?php echo $form->labelEx($model,'name'); ?>
		</div>
	</div>
	<div class="center">
	<div class="form_input">
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		</div>
		<div class="form_error">
		<?php echo $form->error($model,'name'); ?>
	</div>
	</div>
	</div>
	
	<div class="conteiner">
	<div class="left">
	<div class="form_title">
		<?php echo $form->labelEx($model,'html_description'); ?>
		</div>
	</div>
	<div class="center">
	<div class="form_input">
		<?php echo $form->textArea($model,'html_description',array('rows'=>6, 'cols'=>50)); ?>
		</div>
		<div class="form_error">
		<?php echo $form->error($model,'html_description'); ?>
	</div>
	</div>
	</div>

	<div class="conteiner">
	<div class="left">
	<img src="<?php echo realpath(Yii::app()->basePath.'/../image/px.png'); ?>">
	</div>
	<div class="center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
	</div>
		

<?php $this->endWidget(); ?>

</div><!-- form -->