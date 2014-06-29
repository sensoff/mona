<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>
<div class="center">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
		'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>


<div class="conteiner">
	<div class="tactions cell8">
		<div class="form_title">
			Основные параметры каталога
		</div>
	</div>
	<div class="tactions cell8">
		<div class="preform">
			Поля отмеченные <span class="form_title_marker">*</span> обязательны для заполнения
		</div>
</div>
<div class="table cell8 prosmotr">
	<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'show', 'elemtype'=>'checkbox'))?>
	<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'req'=>1, 'model'=>$model, 'elem'=>'url', 'elemtype'=>'textfield'))?>
	</div>

</div>

<?php
	$langs=Lang::getLangs();
	$style='block';
	$req=1;

	//for($i=0;$i<count($langs);$i++){
	for($i=0;$i<1;$i++){
	if($i!=0){
		$style="display: none;";
		$req=null;
	}
		$this->renderPartial('_noLangForm', array(
					'lang'=>$langs[$i],
					'style'=>$style,
					'req'=>$req,
					'form'=>$form,
					'model'=>$model,
					'act'=>$act,
		));
	}
?>
		<div class="tactions cell8">
		<button class="block2 btn ok"><span>Сохранить</span></button>
</div>
<?php $this->endWidget(); ?>
</div><!-- form -->
</div>
