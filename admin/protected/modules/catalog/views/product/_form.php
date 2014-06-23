<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>


<div class="center">
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'product-form',
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

	<div class="tactions block8">
					<div class="form_title">
						Основные параметры товара
					</div>
				</div>

		<div class="tactions block8">
		<div class="preform">
				Поля отмеченные <span class="form_title_marker">*</span> обязательны для заполнения
		</div>
</div>
<div class="table block8 prosmotr">
	<?php
		$types=array(1=>'Tatoo', 2=>'Permanent', 3=>'Flash');
	?>
	<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'name_lang1', 'elemtype'=>'textfield'))?>
	<?php //$this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'req'=>null, 'elem'=>'name_lang2', 'elemtype'=>'textfield'))?>
	<?php //$this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'req'=>null, 'elem'=>'name_lang3', 'elemtype'=>'textfield'))?>
	<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'req'=>1, 'elem'=>'image', 'elemtype'=>'image'))?>
	<?php //$this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'req'=>null, 'elem'=>'date_create', 'elemtype'=>'date'))?>
	<?php //$this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'req'=>1, 'data'=>$types, 'elem'=>'photo_type', 'elemtype'=>'select'))?>
	<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'top', 'elemtype'=>'checkbox'))?>

</div>
<div class="tactions block8">
		<button class="block2 btn ok"><span>Опубликовать</span></button>
</div>



	<?php $this->endWidget(); ?>
	</div>
