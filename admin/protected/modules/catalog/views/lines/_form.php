<?php
/* @var $this LinesController */
/* @var $model Lines */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lines-form',
	'enableAjaxValidation'=>false,
		'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>
	<div class="tactions block8">
		<div class="preform">
				Поля отмеченные <span class="form_title_marker">*</span> обязательны для заполнения
		</div>
</div>
<div class="table block8 prosmotr">
	<?php $this->renderPartial('_formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'name', 'elemtype'=>'textfield'))?>
	<?php $this->renderPartial('_formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'image', 'elemtype'=>'image'))?>
	<?php $this->renderPartial('_formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'show', 'elemtype'=>'checkbox'))?>
	<?php $this->renderPartial('_formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'description', 'elemtype'=>'textedit'))?>

</div>
<div class="tactions block8">
		<button class="block2 btn ok"><span>Опубликовать</span></button>
</div>

<?php $this->endWidget(); ?>
