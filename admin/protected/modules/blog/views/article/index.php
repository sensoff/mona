<?php
/* @var $this ArticleController */
/* @var $dataProvider CActiveDataProvider */
 ?>
<div class="conteiner">
			<div class="left_sidebar">
				<div class="page_title">
				Статьи
				</div>
			</div>
			<div class="center">
				<div class="breadcrumbs">
					<?php 	$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>array('Статьи'=>CHtml::normalizeUrl(array('/blog/article/index')),
				),
		)); ?>
				</div>
			</div>
		</div>
		<div class="conteiner">
			<div class="left_sidebar">
			</div>
			<div class="center">
			<div class="tactions cell8">
					<a class="block2 btn add" href="<?php echo CHtml::normalizeUrl(array('/blog/article/create'))?>"><span>Добавить статью</span></a>
				</div>
				<?php 
					echo $this->renderPartial('_table', array('articles'=>$articles));
				?>
			</div>
		</div>