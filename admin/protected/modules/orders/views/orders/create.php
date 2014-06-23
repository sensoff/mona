

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
					'Добавление каталога'=>'catalog/category/create',
				),
		)); ?>
				</div>
			</div>
		</div>
<div class="conteiner">
<div class="left_sidebar">
			<?php $this->renderPartial('/default/_leftSide', array('selCatalog'=>$selCatalog, 'catalogs'=>$catalogs, 'counts'=>$counts))?>
			<?php
					//$this->renderPartial("application.views.site._langMenu", array('langs'=>Lang::getLangs()));
				?>
				</div>

				<?php $this->renderPartial('_form', array('model'=>$model, 'act'=>'c'))?>

		</div>
