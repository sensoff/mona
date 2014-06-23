<?php
/* @var $this ArticleController */
/* @var $model Article */
?>
<div class="conteiner">
			<div class="left_sidebar">
				<div class="page_title">
					<?php if($blogid==1){?>
					Новости
					<?php }?>
					<?php if($blogid==2 || $blogid==3){?>
					Статьи
					<?php }?>
				</div>
			</div>
			</div>
			<div class="center">
				<div class="center">
				<?php
				if($blogid==1){
					$res['Новости']=CHtml::normalizeUrl(array('/blog/article/index'));
					$res['Добавить новость']=CHtml::normalizeUrl(array('/blog/article/create', 'blogid'=>$blogid));
				}
				if($blogid==2 || $blogid==3){
					$res['Статьи']=CHtml::normalizeUrl(array('/blog/article/index', 'blogid'=>$blogid));
					if($blogid==2){
						$res['О нас']=CHtml::normalizeUrl(array('/blog/article/index', 'blogid'=>$blogid));
					}
					if($blogid==3){
						$res['Обучение']=CHtml::normalizeUrl(array('/blog/article/index', 'blogid'=>$blogid));
					}
						$res['Новая статья']=CHtml::normalizeUrl(array('/blog/article/create', 'blogid'=>$blogid));
				}
				$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$res,
		)); ?>
			</div>
		</div>
		<div class="conteiner">
			<div class="left_sidebar">
				<div class="stat">
					<?php if($blogid==1){?>
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
					<?php }
					if($blogid==2 || $blogid==3){
					?>
						<a href="<?php echo CHtml::normalizeUrl(array('/blog/article/index', 'blogid'=>2))?>" class="line block2 btn">
						<span class="name">
							О нас:
						</span>
						<span class="value">
							<?php echo $counts['about']?>
						</span>
					</a>
						<a href="<?php echo CHtml::normalizeUrl(array('/blog/article/index', 'blogid'=>3))?>" class="line block2 btn">
						<span class="name">
							Обучение:
						</span>
						<span class="value">
							<?php echo $counts['learn']?>
						</span>
					</a>
					<?php }?>
				</div>
			</div>
			<div class="center">

				<?php echo $this->renderPartial('_form', array('model'=>$model, 'blogid'=>$blogid, 'act'=>'c')); ?>

			</div>
		</div>
