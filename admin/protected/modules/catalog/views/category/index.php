<div class="conteiner">
			<div class="left_sidebar">
				<div class="page_title">
					Каталоги
				</div>
			</div>
			<div class="center">
				<div class="breadcrumbs">
				<?php 	$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>array($selCatalog->name=>CHtml::normalizeUrl(array('/catalog/category/index')),
				),
		)); ?>
				</div>
			</div>
		</div>



<div class="conteiner">
			<div class="left_sidebar">
				<?php $this->renderPartial('/default/_leftSide', array('selCatalog'=>$selCatalog, 'catalogs'=>$catalogs, 'counts'=>$counts))?>
			</div>
			<div class="center">
				<div class="tactions cell8">
					<a class="block2 btn add" href="<?php echo CHtml::normalizeUrl(array('/catalog/category/create', 'catalog'=>$selCatalog->id))?>"><span>Добавить каталог</span></a>
				</div>
				<?php
					echo $this->renderPartial('_table', array('categories'=>$categories));
				?>
			</div>
		</div>
