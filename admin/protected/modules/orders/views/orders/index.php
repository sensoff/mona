<div class="conteiner">
	<div class="left_sidebar">
		<div class="page_title">
			Заказы
		</div>
	</div>
	<div class="center">
		<div class="breadcrumbs">
			<?php
          $this->widget('zii.widgets.CBreadcrumbs', array(
			         'links'=>array('Заказы'=>CHtml::normalizeUrl(array('/orders/orders/index')),
				    ),
	    )); ?>
		</div>
	</div>
</div>

<div class="conteiner">
	<div class="left_sidebar">
		<?php $this->renderPartial('/default/_leftSide', array('orders'=>$orders, 'counts'=>$counts))?>
	</div>
	<div class="center">
		<?php echo $this->renderPartial('_table', array('orders'=>$orders));	?>
	</div>
</div>
