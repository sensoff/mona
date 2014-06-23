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
							'Новый слайд'=>CHtml::normalizeUrl(array('/slider/create')),
				),
		)); ?>
				</div>
			</div>
		</div>
<div class="conteiner">
			<div class="left_sidebar">
		<?php 
					$this->renderPartial("application.views.site._langMenu", array('langs'=>Lang::getLangs()));
				?>
			</div>
			
				<?php $this->renderPartial('_form', array('model'=>$model, 'act'=>'c'))?>
			
		</div>