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
			<span class="cell_value"><?php echo $prod->name?></span>
		</div>
	</div>
	
	<div class="tablecell cell">
		<div class="tcontent">
			<span class="cell_name">Опубликовано: </span>
			<span class="cell_value">
			<?php 
				if($prod->top==1){
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
				<a href="<?php echo CHtml::normalizeUrl(array('/catalog/product/update', 'id'=>$prod->id))?>" class="btn edit"></a>
				<?php echo CHtml::link('',array('/catalog/product/delete', 'id'=>$prod->id), array(
   			 'submit'=>array('/catalog/product/delete', 'id'=>$prod->id),
    			'class' => 'btn delete','confirm'=>'Подтвердите удаление'
 				 ))?>
  			</span>
		</div>
	</div>
</div>
