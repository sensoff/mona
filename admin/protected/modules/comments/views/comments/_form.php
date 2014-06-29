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
				<div class="row">
					<div class="tablecell cell2">
						<div class="tcontent">
							<span class="cell_name">Дата</span>
						</div>
					</div>
					<div class="tablecell cell6">
						<div class="tcontent">
							<span class="cell_value">
								<?php echo $model -> date?>
							</span>
  					</div>
					</div>
				</div>
				<div class="row">
					<div class="tablecell cell2">
						<div class="tcontent">
							<span class="cell_name">Автор</span>
						</div>
					</div>
					<div class="tablecell cell6">
						<div class="tcontent">
							<span class="cell_value">
								<?php echo $model -> user?>
							</span>
  					</div>
					</div>
				</div>
				<div class="row">
					<div class="tablecell cell2">
						<div class="tcontent">
							<span class="cell_name">Комментарий</span>
						</div>
					</div>
					<div class="tablecell cell6">
						<div class="tcontent">
							<span class="cell_value">
								<?php echo $model -> comment?>
							</span>
  					</div>
					</div>
				</div>
				<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'approve', 'elemtype'=>'checkbox'))?>
				<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'answer', 'elemtype'=>'textarea'))?>
				</div>
			</div>
			<div class="tactions block8">
		<button class="block2 btn ok"><span>Сохранить</span></button>
</div>
		<?php $this->endWidget(); ?>
	</div><!-- form -->
</div>
