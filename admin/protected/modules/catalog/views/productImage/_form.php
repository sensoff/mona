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
						Основные параметры Изображения
					</div>
				</div>
	<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'req'=>1, 'model'=>$model, 'elem'=>'image_name', 'elemtype'=>'image'))?>
	<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'show', 'elemtype'=>'checkbox'))?>
	<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'description', 'elemtype'=>'textedit'))?>
	</div>
	<div class="tactions block8">
		<button class="block2 btn ok"><span>Опубликовать</span></button>
</div>
		
<?php $this->endWidget(); ?>
</div><!-- form -->
</div>

<div class="center">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
		'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

	


<div class="table block8 prosmotr">

	<div class="tactions block8">
					<div class="form_title">
						Параметры для Seo
					</div>
				</div>
	<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'title', 'elemtype'=>'textfield'))?>
	<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'keywoards', 'elemtype'=>'textfield'))?>
	<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'description_meta', 'elemtype'=>'textarea'))?>
	</div>
	<div class="tactions block8">
		<button class="block2 btn ok"><span>Сохранить</span></button>
</div>
		
<?php $this->endWidget(); ?>
</div><!-- form -->
</div>