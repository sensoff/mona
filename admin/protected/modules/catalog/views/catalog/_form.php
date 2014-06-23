<?php
/* @var $this CatalogController */
/* @var $model Catalog */
/* @var $form CActiveForm */
?>

<div class="conteiner">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'catalog-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="conteiner">
	<div class="left">
	<div class="form_title">
		<?php echo $model->attributeLabels()['name'] ?>
	</div>
	</div>
	<div class="center">
	<div class="form_input">
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50, 'class'=>"small")); ?>
	</div>
		<?php echo $form->error($model,'name'); ?>
	</div>
	</div>

	<div class="conteiner">
	<div class="left">
	<div class="form_title">
		<?php echo $model->attributeLabels()['url'] ?>
	</div>
	</div>
	<div class="center">
	<div class="form_input">	
		<?php echo $form->textField($model,'url',array('size'=>50,'maxlength'=>50, 'class'=>'small')); ?>
	</div>
		<?php echo $form->error($model,'url'); ?>
	</div>
	</div>

	<div class="conteiner">
	<div class="left">
	<img src="<?php echo realpath(Yii::app()->basePath.'/../image/px.png'); ?>">
	</div>
	<div class="center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'form_button')); ?>
	</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->