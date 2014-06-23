<div class="conteiner">
			<div class="left_sidebar">
				<div class="page_title">
					Каталог
				</div>
			</div>
			<div class="center">
				<div class="breadcrumbs">
					<a href="#">Каталог</a>
					<a href="#">Категория</a>
					<a href="#">Все линии</a>
					<a href="#">Линия</a>
					<a href="#">Все продукты</a>
					<a href="#">Добавление продукта</a>
				</div>
			</div>
		</div>
		<div class="conteiner">
			<div class="left_sidebar">
				<?php $this->renderPartial("application.views.site._counts", array('elems'=>array(
					array('name'=>'все товары', 'value'=>$counts['t'], 'link'=>CHtml::normalizeUrl(array('/catalog/category/view', 'id'=>$product->category_id))),
					array('name'=>'Опубликованные продукты', 'value'=>$counts['tp'], 'link'=>CHtml::normalizeUrl(array('/catalog/category/view', 'id'=>$product->category_id, 'show'=>1))),
					array('name'=>'Неопубликованные товары', 'value'=>$counts['tu'], 'link'=>CHtml::normalizeUrl(array('/catalog/category/view', 'id'=>$product->category_id, 'show'=>0))),
						
				)));?>
				<div class="product_about block2">
					
					<div class="image">
						<img alt="" src="<?php echo Yii::app()->params['imagePath'].'products/'.$model->image_name;?>">
					</div>
					
				</div>
			</div>
			
				<?php 
				$this->renderPartial('_form',array('model'=>$model));
				?>
			
		</div>