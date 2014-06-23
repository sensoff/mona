<div class="conteiner">
			<div class="left_sidebar">
				<div class="page_title">
					Файлы
				</div>
			</div>
			<div class="center">
				<div class="breadcrumbs">
						<?php 	$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>array('Файлы'=>CHtml::normalizeUrl(array('/files/index')),
							'Новый файл'=>CHtml::normalizeUrl(array('/files/create')),
				),
		)); ?>
				</div>
			</div>
		</div>
<div class="conteiner">
			<div class="left_sidebar">
		
			</div>
			
				<?php $this->renderPartial('_form', array('model'=>$model, 'act'=>'c'))?>
			
		</div>