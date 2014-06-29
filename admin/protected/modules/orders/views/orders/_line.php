<div class="row">
	<div class="tablecell cell">
		<div class="tcontent">
			<span class="cell_name">Дата: </span>
			<span class="cell_value"><?php echo $order->date?></span>
		</div>
	</div>

	<div class="tablecell cell">
		<div class="tcontent">
			<span class="cell_name">Пользователь: </span>
			<span class="cell_value small"><?php echo $order->user?></span>
		</div>
	</div>

	<div class="tablecell cell4 sliding">
		<div class="tcontent">
			<span class="cell_name">Отзыв: </span>
			<span class="cell_value">+375<?php echo $order->phone;?></span>
		</div>
		<?php if ($order->product) {?>
			<div class="tcontent">
				<img src="<?php echo Yii::app()->baseUrl?>/../images/<?php echo $order->product ?>" />
				<?php echo $order->price ?>
			</div>
		<? } ?>
	</div>

	<div class="tablecell cell">
		<div class="tcontent">
			<span class="cell_name">Проверенно: </span>
			<span class="cell_value">
				<?php
					if ($order->approve == 1) {
						echo 'Да';
					} else {
						echo 'Нет';
					}
				?>
			</span>
		</div>
	</div>

	<div class="tablecell cell">
		<div class="tcontent">
			<span class="actions">

			<?php
				if ($order->approve == 0) {
					echo CHtml::link('',array('/orders/orders/approved', 'id'=>$order->id), array(
	   				'submit'=>array('/orders/orders/approved', 'id'=>$order->id),
	    			'class' => 'btn approved','confirm'=>'Изменить статус на проверенно',
	    			'title'=>'Изменить статус на проверенно'));
				} else {
					echo CHtml::link('',array('/orders/orders/noapproved', 'id'=>$order->id), array(
	   				'submit'=>array('/orders/orders/noapproved', 'id'=>$order->id),
	    			'class' => 'btn noapproved',
	    			'confirm'=>'Изменить статус на не проверенно',
	    			'title'=>'Изменить статус на не проверенно'));
				}
 			?>

			<?php echo CHtml::link('',array('/orders/orders/delete', 'id'=>$order->id), array(
   			 'submit'=>array('/orders/orders/delete', 'id'=>$order->id),
    			'class' => 'btn delete','confirm'=>'Подтвердите удаление'
 			))?>
  		</span>
		</div>
	</div>
</div>
