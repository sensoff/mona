<?php
/* @var $this ProdElementTypeController */
/* @var $model ProdElementType */
 ?>
<div class="conteiner">
				<div class="left2">
				<?php $this->widget('application.components.leftMenu', array('menu'=>CatalogModule::leftMenu())); ?>
				<?php $this->widget('application.components.leftMenu', array('menu'=>CatalogModule::getCategoryMenu())); ?>
				</div>
				<div class="center2">

<div class="conteiner">
						<div class="center">
							<div class="statistics">Характеристика <?php echo $model->lable?></div>
						</div>
						<div class="right">
							<a href="<?php echo CHtml::normalizeUrl(array('ProdElementTypeValues/create', 'typeid'=>$model->id))?>" class="add_new" title="Добавить тип товара">Значение</a>
						</div>
					</div>
<?php if($model->input_type=='Select'){
	echo $this->renderPartial("_valuesTable", array('values'=>$values));
}?>
</div>
</div>