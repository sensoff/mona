<?php
/* @var $this ProdElementTypeController */
/* @var $model ProdElementType */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prod-element-type-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>


		<div class="conteiner">
	<div class="left">
	<div class="form_title">
		<?php echo $form->labelEx($model,'lable'); ?>
		</div>
		</div>
	<div class="center">
	<div class="form_input">
		<?php echo $form->textField($model,'lable',array('size'=>40,'maxlength'=>120)); ?>
		</div>
		<div class="form_error">
		<?php echo $form->error($model,'lable'); ?>
	</div>
	</div>
	</div>
	
	<div class="conteiner">
	<div class="left">
	<div class="form_title">
		<?php echo $form->labelEx($model,'ed_izmerenia'); ?>
			</div>
	</div>
	<div class="center">
	<div class="form_input">
		<?php echo $form->textField($model,'ed_izmerenia',array('size'=>30,'maxlength'=>30)); ?>
		</div>
		<div class="form_error">
		<?php echo $form->error($model,'ed_izmerenia'); ?>
	</div>
	</div>
	</div>



	<div class="conteiner">
	<div class="left">
	<div class="form_title">
		<?php echo $form->labelEx($model,'input_type'); ?>
	</div>
	</div>
	<div class="center">
	<div class="form_input">
		<?php $data['Input']='текстовое поле';
	$data['Select']='выподающий список';
	$data['Checkbox']='чекбокс';
		echo $form->dropDownList($model, 'input_type', $data); ?>
		</div>
		<div class="form_error">
		<?php echo $form->error($model,'input_type'); ?>
	</div>
	</div>
	</div>


	<div class="conteiner">
	<div class="left">
	<div class="form_title">
		<?php echo $form->labelEx($model,'description'); ?>
		</div>
		</div>
	<div class="center">
	<div class="form_input">
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		</div>
		<div class="form_error">
		<?php echo $form->error($model,'description'); ?>
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