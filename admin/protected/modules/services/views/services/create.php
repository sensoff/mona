<div class="conteiner">
			<div class="left_sidebar">
				<div class="page_title">
					Каталог
				</div>
			</div>
			<div class="center">
				<div class="breadcrumbs">
					<?php 	$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>array('Услуги'=>CHtml::normalizeUrl(array('/services/services/index')),
					'Новая услуга'=>CHtml::normalizeUrl(array('/services/services/create'))
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
			
				<?php 
				$this->renderPartial('_form',array('model'=>$model, 'act'=>'c'));
				?>
			
		</div>