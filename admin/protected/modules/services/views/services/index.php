<?php
/* @var $this ServicesController */
/* @var $dataProvider CActiveDataProvider */

?>


<div class="conteiner">
	<div class="left_sidebar">
		<div class="page_title">Каталог</div>
	</div>
	<div class="center">
				<div class="breadcrumbs">
					<?php 	$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>array('Услуги'=>CHtml::normalizeUrl(array('/services/services/index')),
					
				),
		)); ?>
				</div>
			</div>
</div>


<div class="conteiner">
	<div class="left_sidebar">
			<?php $this->renderPartial("application.views.site._counts", array('elems'=>array(
					array('name'=>'все товары', 'value'=>$counts['all'], 'link'=>CHtml::normalizeUrl(array('/services/services/index'))),
					array('name'=>'Опубликованные продукты', 'value'=>$counts['show'], 'link'=>CHtml::normalizeUrl(array('/services/services/index', 'show'=>1))),
					array('name'=>'Неопубликованные товары', 'value'=>$counts['nshow'], 'link'=>CHtml::normalizeUrl(array('/services/services/index', 'show'=>0))),
						
				)));?>
	</div>
	<div class="center">
		<div class="tactions block5">
			<a class="block2 btn add"
				href="<?php echo CHtml::normalizeUrl(array('/services/services/create'))?>"><span>Добавить
					Услугу</span> </a>
		</div>
		<?php $this->renderPartial('_table', array('services'=>$services));?>

	</div>
</div>

