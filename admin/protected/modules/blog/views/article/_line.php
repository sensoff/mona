<div class="row">
	<div class="tablecell cell">
		<div class="tcontent">
			<span class="cell_name">Позиция: </span>
			<span class="cell_value"><?php echo $pos?></span>
		</div>
	</div>
	
	<div class="tablecell cell6 sliding">
		<div class="tcontent">
			<span class="cell_name">Название: </span>
			<span class="cell_value"><?php echo $article->name_lang1?></span>
		</div>
	</div>
	
	<div class="tablecell cell">
		<div class="tcontent">
			<span class="actions">
				<a href="<?php echo CHtml::normalizeUrl(array('/blog/article/update','id'=>$article->id))?>" class="btn edit"></a>
				<?php echo CHtml::link('',array('/blog/article/delete', 'id'=>$article->id), array(
   			 'submit'=>array('/blog/article/delete', 'id'=>$article->id),
    			'class' => 'btn delete','confirm'=>'Подтвердите удаление'
 				 ))?>
  			</span>
		</div>
	</div>
</div>
