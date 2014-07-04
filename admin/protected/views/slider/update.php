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
							'Редактировать слайд'=>CHtml::normalizeUrl(array('/slider/update', 'id'=>$model->id)),
				),
		)); ?>
				</div>
			</div>
		</div>
<div class="conteiner">
			<div class="left_sidebar">
			</div>

				<?php $this->renderPartial('_form', array('model'=>$model, 'act'=>'u'))?>

		</div>
