<?php
/* @var $this BlogController */
/* @var $model Blog */
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
					Создание новости
				</div>
			</div>
			<div class="tactions cell8">
				<div class="preform-text">
					<div class="conteiner" style="margin-bottom: 20px;">
					<span class="form_title_marker">*</span> Для того чтобы <strong>добавить изображение</strong> в новость нужно: <br />
					1) Выбрать пункт меню <strong>Файлы</strong> <br />
					2) Добавить изображение	<br />
					3) Найти изображение в списке и скопировать путь к нему <br />
					4.1) В редакторе выбарать <strong>Inser Image</strong> и вставить путь<br />
					4.2) Либо в редакторе выбарать последнюю опцию <strong>Show source</strong> и написать <br />
					<strong><span class="tag">&lt;<span class="keyword">img</span><span class="attribute"> src=<span class="value">"Скопированный путь к изображению"</span></span><span class="attribute"> &gt;</span></strong><br />
					</div>
				</div>
			</div>
			<div class="table cell8 prosmotr">
				<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'main_text_lang1', 'elemtype'=>'textedit'))?>
				<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'show', 'elemtype'=>'checkbox'))?>
			</div>

		</div>
		<div class="tactions cell8">
				<button class="block2 btn ok"><span>Сохранить</span></button>
		</div>
		<?php $this->endWidget(); ?>
	</div><!-- form -->
</div>
