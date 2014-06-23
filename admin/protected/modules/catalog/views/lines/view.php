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
				</div>
			</div>
		</div>
<div class="conteiner">
			<div class="left_sidebar">
				<div class="stat">
					<a href="<?php echo CHtml::normalizeUrl(array('/catalog/lines/view', 'id'=>$model->id))?>" class="line block2 btn">
						<span class="name">
							Все продукты
						</span>
						<span class="value">
							<?php echo $counts['t']?>
						</span>
					</a>
					<a href="<?php echo CHtml::normalizeUrl(array('/catalog/lines/view', 'id'=>$model->id, 'show'=>0))?>" class="line block2 btn">
						<span class="name">
							Необубликованные продукты:
						</span>
						<span class="value">
							<?php echo $counts['tu']?>
						</span>
					</a>
					<a href="<?php echo CHtml::normalizeUrl(array('/catalog/lines/view', 'id'=>$model->id, 'show'=>1))?>" class="line block2 btn">
						<span class="name">
							Опубликованные продукты:
						</span>
						<span class="value">
							<?php echo $counts['tp']?>
						</span>
					</a>
				</div>
			</div>
			<div class="center">
				<div class="tactions block5">
					<a class="block2 btn add" href="<?php echo CHtml::normalizeUrl(array('/catalog/product/create', 'cid'=>$model->id))?>"><span>Добавить продукт</span></a>
				</div>
				<?php $this->renderPartial('_prodTable', array('prods'=>$prods))?>
			</div>
		</div>