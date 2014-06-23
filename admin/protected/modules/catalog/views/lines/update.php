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
					<a href="#">Добавление линии</a>
				</div>
			</div>
		</div>
		<div class="conteiner">
			<div class="left_sidebar">
				<div class="stat">
					<a href="<?php echo CHtml::normalizeUrl(array('/catalog/category/view', 'id'=>$model->category_id))?>" class="line block2 btn">
						<span class="name">
							Все линии
						</span>
						<span class="value">
							<?php echo $counts['all']?>
						</span>
					</a>
					<a href="<?php echo CHtml::normalizeUrl(array('/catalog/category/view', 'id'=>$model->category_id, 'show'=>0))?>" class="line block2 btn">
						<span class="name">
							Необубликованные линии:
						</span>
						<span class="value">
							<?php echo $counts['nshow']?>
						</span>
					</a>
					<a href="<?php echo CHtml::normalizeUrl(array('/catalog/category/view', 'id'=>$model->category_id, 'show'=>1))?>" class="line block2 btn">
						<span class="name">
							Опубликованные линии:
						</span>
						<span class="value">
							<?php echo $counts['show']?>
						</span>
					</a>
				</div>
			</div>
			<div class="center">
				<?php 
					$this->renderPartial('_form', array('model'=>$model));
				?>
			</div>
		</div>