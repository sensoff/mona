<div class="row">
	<div class="tablecell cell">
		<div class="tcontent">
			<span class="cell_name">Позиция: </span>
			<span class="cell_value"><?php echo $pos?></span>
		</div>
	</div>
	
	<div class="tablecell cell3">
		<div class="tcontent">
			<span class="cell_name">Название: </span>
			<span class="cell_value"><?php echo $service->name?></span>
		</div>
	</div>
	<div class="tablecell cell">
		<div class="tcontent">
			<span class="actions">
				<a href="<?php echo CHtml::normalizeUrl(array('/services/services/update', 'id'=>$service->id))?>" class="btn edit"></a>
				<?php echo CHtml::link('',array('/services/services/delete', 'id'=>$service->id), array(
   			 'submit'=>array('/services/services/delete', 'id'=>$service->id),
    			'class' => 'btn delete','confirm'=>'Подтвердите удаление'
 				 ))?>
  			</span>
		</div>
	</div>
</div>
