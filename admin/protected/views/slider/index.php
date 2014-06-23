<?php
/* @var $this SliderController */
/* @var $dataProvider CActiveDataProvider */
?>
<div id="content">
		<div class="conteiner">
			<div class="left_sidebar">
				<div class="page_title">
					Слайдер
				</div>
			</div>
			<div class="center">
				<div class="breadcrumbs">
						<?php 	$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>array('Слайдер'=>CHtml::normalizeUrl(array('/slider/index')),
				),
		)); ?>
				</div>
			</div>
		</div>
		<div class="conteiner">
			<div class="left_sidebar">
				
			</div>
			<div class="center">
				<div class="tactions cell8">
					<a class="block2 btn add" href="<?php echo CHtml::normalizeUrl(array('/slider/create'))?>"><span>Добавить слайд</span></a>
				</div>
				<?php $this->renderPartial('_table', array('slider'=>$slider))?>
			</div>
		</div>
	</div>