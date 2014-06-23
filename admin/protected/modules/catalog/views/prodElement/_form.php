<?php
/* @var $this ProdElementController */
/* @var $model ProdElement */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prod-element-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>


	<div class="conteiner">
	<div class="left">
	<div class="form_title">
		<?php echo $form->labelEx($model,'prod_element_type_id'); ?>
			</div>
	</div>
	<div class="center">
	<div class="form_input">
		<?php echo $form->dropDownList($model, 'prod_element_type_id', $values); ?>
		</div>
		<div class="form_error">
		<?php echo $form->error($model,'prod_element_type_id'); ?>
	</div>
	</div>
	</div>
		

	<div class="conteiner">
	<div class="left">
	<div class="form_title">
		<?php echo $form->labelEx($model,'value'); ?>
		</div>
	</div>
	<div class="center">
	<div class="form_input">
		<?php echo $form->textField($model,'value',array('size'=>50,'maxlength'=>50)); ?>
		</div>
		<div class="form_error">
		<?php echo $form->error($model,'value'); ?>
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