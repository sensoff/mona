<div class="row">
	<div class="tablecell cell">
		<div class="tcontent">
			<span class="cell_name">Позиция: </span>
			<span class="cell_value"><?php echo $pos?></span>
		</div>
	</div>

	<div class="tablecell cell2">
		<div class="tcontent">
			<span class="cell_name">Название: </span>
			<span class="cell_value"><?php echo $line->name?></span>
		</div>
	</div>

	<div class="tablecell cell">
		<div class="tcontent">
			<span class="cell_name">Опубликовано: </span>
			<span class="cell_value">
			<?php
				if($line->show==1){
					echo 'да';
				} else {
					echo 'нет';
				}
			?>
			</span>
		</div>

	</div>
	<div class="tablecell cell">
		<div class="tcontent">
			<span class="actions">
				<a href="<?php echo CHtml::normalizeUrl(array('/catalog/lines/view', 'id'=>$line->id))?>" class="btn view"></a>
				<a href="<?php echo CHtml::normalizeUrl(array('/catalog/lines/update', 'id'=>$line->id))?>" class="btn edit"></a>
				<?php echo CHtml::link('',array('/catalog/lines/delete', 'id'=>$line->id), array(
   			 'submit'=>array('/catalog/lines/delete', 'id'=>$line->id),
    			'class' => 'btn delete','confirm'=>'Подтвердите удаление'
 				 ))?>
  			</span>
		</div>
	</div>
</div>
