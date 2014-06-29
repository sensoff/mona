<?php
/* @var $this ArticleController */
/* @var $dataProvider CActiveDataProvider */
 ?>
<div class="conteiner">
	<div class="left_sidebar">
		<div class="page_title">
			Новости
		</div>
	</div>
	<div class="center">
		<div class="breadcrumbs">
				<?php 	$this->widget('zii.widgets.CBreadcrumbs', array(
										'links'=>array('Все новости'=>CHtml::normalizeUrl(array('/blog/article/index')),

				),
			)); ?>
		</div>
	</div>
</div>

<div class="conteiner">
	<div class="left_sidebar">
  	<div class="stat">
			<a href="<?php echo CHtml::normalizeUrl(array('/blog/article/index', 'blogid'=>1))?>" class="line block2 btn">
				<span class="name">
					Все новости:
				</span>
				<span class="value">
					<?php echo $counts['all']?>
				</span>
			</a>
			<a href="<?php echo CHtml::normalizeUrl(array('/blog/article/index', 'blogid'=>1, 'show'=>0))?>" class="line block2 btn">
				<span class="name">
					Неопубликованные новости:
				</span>
				<span class="value">
					<?php echo $counts['nshow']?>
				</span>
			</a>
			<a href="<?php echo CHtml::normalizeUrl(array('/blog/article/index', 'blogid'=>1, 'show'=>1))?>" class="line block2 btn">
				<span class="name">
					Опубликованные новости:
				</span>
				<span class="value">
					<?php echo $counts['show']?>
				</span>
			</a>
		</div>
	</div>
	<div class="center">
	<div class="tactions cell8">
						<a class="block2 btn add" href="<?php echo CHtml::normalizeUrl(array('/blog/article/create'))?>"><span>Добавить новость</span></a>
					</div>
		<?php
			echo $this->renderPartial('_table', array('articles'=>$articles));
		?>
	</div>
</div>
