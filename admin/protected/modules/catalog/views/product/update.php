<div class="conteiner">
			<div class="left_sidebar">
				<div class="page_title">
					Каталог
				</div>
			</div>
			<div class="center">
				<div class="breadcrumbs">
					<?php 	$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>array($catalog->name=>CHtml::normalizeUrl(array('/catalog/category/index')),
					$category->name_lang1=>CHtml::normalizeUrl(array('/catalog/category/view', 'id'=>$category->id)),
					'Редактирование фото'=>CHtml::normalizeUrl(array('/catalog/product/update', 'id'=>$model->id)),
				),
		)); ?>
			</div>
		</div>
		<div class="conteiner">
			<div class="left_sidebar">
				<?php 
					 $this->renderPartial("application.views.site._counts", array('elems'=>$leftMenu));
				?>
				<div class="product_about block2">
					
					<div class="image">
						<img alt="" src="<?php echo Yii::app()->params['imagePath'].'products/'.$model->image;?>">
					</div>
					
				</div>
				
			</div>
			
				<?php 
				$this->renderPartial('_form',array('model'=>$model, 'act'=>'u', 'images'=>$images));
				?>
			
		</div>