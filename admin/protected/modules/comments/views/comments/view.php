<?php 
?>


<div class="conteiner">
			<div class="left_sidebar">
				<div class="page_title">
				Мастер
				</div>
			</div>
			<div class="center">
				<div class="breadcrumbs">
					<?php 	$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>array($catalog->name=>CHtml::normalizeUrl(array('/catalog/category/index', 'catalog'=>$catalog->id)),
					$model->name_lang1=>CHtml::normalizeUrl(array('/catalog/category/view', 'id'=>$model->id)),
				),
		)); ?>
				</div>
			</div>
		</div>
<div class="conteiner">
			<div class="left_sidebar">
				<?php 
					 $this->renderPartial("application.views.site._counts", array('elems'=>$leftMenu));
				?>
			</div>
			<div class="center">
				<div class="tactions block8">
					<a class="block2 btn add" href="<?php echo CHtml::normalizeUrl(array('/catalog/product/create', 'cid'=>$model->id))?>"><span>Добавить фото</span></a>
				</div>
				<?php $this->renderPartial('_prodTable', array('prods'=>$prods))?>
			</div>
		</div>