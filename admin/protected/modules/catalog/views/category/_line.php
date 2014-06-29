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
			<span class="cell_value"><?php echo $categorie->name_lang1?></span>
		</div>
	</div>
	<div class="tablecell cell">
		<div class="tcontent">
			<span class="actions">
			<a href="<?php echo CHtml::normalizeUrl(array('/catalog/category/view', 'id'=>$categorie->id))?>" class="btn photos" title="Фото в каталоге"></a>
				<a href="<?php echo CHtml::normalizeUrl(array('/catalog/category/update', 'id'=>$categorie->id))?>" class="btn edit"></a>
				<?php echo CHtml::link('',array('/catalog/category/delete', 'id'=>$categorie->id), array(
   			 'submit'=>array('/catalog/category/delete', 'id'=>$categorie->id),
    			'class' => 'btn delete','confirm'=>'Подтвердите удаление'
 				 ))?>
  			</span>
		</div>
	</div>
</div>
