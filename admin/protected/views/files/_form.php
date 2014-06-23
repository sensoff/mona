<?php
/* @var $this FilesController */
/* @var $model Files */
/* @var $form CActiveForm */
?>

<div class="center">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
		'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

	

	<div class="tactions block8">
		<div class="preform">
				Поля отмеченные <span class="form_title_marker">*</span> обязательны для заполнения
		</div>
</div>
<div class="table block8 prosmotr">

	<div class="tactions block8">
					<div class="form_title">
						Основные параметры Файлов
					</div>
				</div>
	<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'req'=>1, 'model'=>$model, 'elem'=>'file', 'elemtype'=>'image'))?>
	</div>
	<div class="tactions block8">
		<button class="block2 btn ok"><span>Опубликовать</span></button>
</div>
		
<?php $this->endWidget(); ?>
</div><!-- form -->
</div>