<div class="conteiner">
	<div class="left_sidebar">
		<div class="page_title">
			Отзывы
		</div>
	</div>
	<div class="center">
		<div class="breadcrumbs">
			<?php
          $this->widget('zii.widgets.CBreadcrumbs', array(
			         'links'=>array('Отзывы'=>CHtml::normalizeUrl(array('/comments/comments/index')),
				    ),
	    )); ?>
		</div>
	</div>
</div>

<div class="conteiner">
	<div class="left_sidebar">
		<?php $this->renderPartial('/default/_leftSide', array('comments'=>$comments, 'counts'=>$counts))?>
	</div>
	<div class="center">
		<?php echo $this->renderPartial('_table', array('comments'=>$comments));	?>
	</div>
</div>
