<?php
/* @var $this ProductController */
/* @var $model Product */
$this->breadcrumbs=array(
		$model->name,
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/protected/modules/catalog/js/update.js');
?>
<div class="conteiner">

</div>
<div class="conteiner">
	<div class="left2">
		<?php $this->widget('application.components.leftMenu', array('menu'=>CatalogModule::leftMenu())); ?>
		<?php $this->widget('application.components.leftMenu', array('menu'=>CatalogModule::getCategoryMenu())); ?>
	</div>
	<div class="center2">

		<div class="conteiner">
			<div class="left3">
				<div class="statistics">
					<?php echo $model->name?>
				</div>
				<div class="product_image">
					<?php echo CHtml::image(Yii::app()->params['parenthost'].'images/'.$model->image)?>
				</div>
				<div class="add_new left" title="Изменить фото"
					id="open_file_change">Изменить фото</div>

				<div class="otstup conteiner"></div>
				<div class="conteiner load_file_ajax" id="ajax_box">

					<div class="load_file">
						<div class="conteiner">
							<span class="close">закрыть</span>
						</div>
						<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'product-form',
			'enableAjaxValidation'=>false,
			'action'=>CHtml::normalizeUrl(array('/catalog/product/update', 'id'=>$model->id)),
			'htmlOptions'=>array('enctype' => 'multipart/form-data'),
			)); 
							echo $form->fileField($model, 'image');
							echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');
						 $this->endWidget(); ?>
					</div>

				</div>
				<div class="conteiner">
					<div class="conteiner">
						<div class="statistics sm">Альбом</div>
						<a
							href="<?php echo CHtml::normalizeUrl(array('/catalog/productImage/create', 'prodid'=>$model->id))?>"
							class="add_new" title="Добавить фото">Фото</a>
					</div>
					<?php 
					for($i=0;$i<count($images);$i++){
							$this->renderPartial('_image',array('image'=>$images[$i]));
						}
						?>
				</div>
			</div>

			<div class="center3">
				<div class="otstup conteiner"></div>
				<div class="otstup conteiner"></div>
				<?php 

				$this->renderPartial('_mainTable', array('prod'=>$model, 'category'=>$category));
				?>
				<div class="otstup conteiner"></div>
				<?php 
				$this->renderPartial('_valueTable', array('values'=>$values, 'prodid'=>$model->id));
				?>
			</div>

		</div>



	</div>
</div>
