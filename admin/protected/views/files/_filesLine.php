<div class="row">
	<div class="tablecell cell">
		<div class="tcontent">
			<span class="cell_name">Фото: </span>
			<span class="cell_value">
				<img src="<?php echo Yii::app()->params['imagePath'].'files/'.$file->file?>">
			</span>
		</div>
	</div>

	<div class="tablecell cell6 sliding">
		<div class="tcontent">
			<span class="cell_name">Файл: </span>
			<span class="cell_value"><?php echo $file->url?></span>
		</div>
	</div>

	<div class="tablecell cell">
		<div class="tcontent">
			<span class="actions">
				<?php echo CHtml::link('',array('/files/delete', 'id'=>$file->id), array(
    		'submit'=>array('/files/delete', 'id'=>$file->id),
    		'class' => 'delete','confirm'=>'This will remove the image. Are you sure?'));?>
			</span>
		</div>
	</div>
</div>
