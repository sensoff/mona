<div class="conteiner">
			<div class="left_sidebar">
				<div class="page_title">
					<?php echo $cat->name_lang1; ?>
				</div>
			</div>
			<div class="center">
				<div class="breadcrumbs">
					<?php 	$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>array('Каталог ('.$catalog->name.')'=>CHtml::normalizeUrl(array('/catalog/category/index')),
					$category->name_lang1=>CHtml::normalizeUrl(array('/catalog/category/view', 'id'=>$category->id)),
					'Новое фото'=>CHtml::normalizeUrl(array('/catalog/product/create', 'cid'=>$category->id)),
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
				<div class="product_about">
		<div class="image">
			<img alt="" src="../images/catalog/medium/<?php echo $cat->image1; ?>" />
		</div>
	</div>
	<div class="product_name">
		<?php echo $cat->name_lang1; ?>
	</div>
			</div>

				<?php
				$this->renderPartial('_form',array('model'=>$model, 'act'=>'c'));
				?>

		</div>
