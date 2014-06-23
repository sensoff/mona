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
				),
		)); ?>
				</div>
			</div>
			
		</div>
		<div class="conteiner">
			<div class="left_sidebar">
				
			</div>
			<div class="center">
				<div class="tactions block5">
					<a class="block2 btn add" href="<?php echo CHtml::normalizeUrl(array('/files/create'))?>"><span>Добавить файл</span></a>
				</div>
				<div class="conteiner">
					<?php $this->renderPartial('_filesTable', array('files'=>$model))?>
					<div class="postr block5">
							<?php
							if($pcount>1){ 
							$this->widget('application.components.pager', array('pagecount'=>$pcount,
									'link'=>array('/files/index'),
									'selectedpage'=>$page));
							}
							?>			
							
						</div>
				</div>
			</div>
			
			
		</div>