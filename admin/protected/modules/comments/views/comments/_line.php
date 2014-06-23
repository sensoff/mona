<div class="row">
	<div class="tablecell cell">
		<div class="tcontent">
			<span class="cell_name">Дата: </span>
			<span class="cell_value"><?php echo $comment->date?></span>
		</div>
	</div>

	<div class="tablecell cell5 sliding">
		<div class="tcontent">
			<span class="cell_name">Отзыв: </span>
			<span class="cell_value small" style="text-align: justify;">
				<span class="conteiner">
					<?php echo $comment->comment;?>
				</span>
				<span class="conteiner">
					<span class="comment_user" style="float: left;">
						<strong><?php echo $comment->user; ?></strong>
					</span>
					<span class="comment_date" style="float: right;">
						Оценка: <strong><?php echo $comment->rating?></strong>
					</span>
				</span>
			</span>
		</div>
	</div>

	<div class="tablecell cell">
		<div class="tcontent">
			<span class="cell_name">Опубликовано: </span>
			<span class="cell_value">
				<?php
					if ($comment->approve == 1) {
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
				if ($comment->approve == 0) {
					echo CHtml::link('',array('/comments/comments/approved', 'id'=>$comment->id), array(
	   				'submit'=>array('/comments/comments/approved', 'id'=>$comment->id),
	    			'class' => 'btn approved','confirm'=>'Подтвердите публикацию отзыва',
	    			'title'=>'Опубликовать'));
				} else {
					echo CHtml::link('',array('/comments/comments/noapproved', 'id'=>$comment->id), array(
	   				'submit'=>array('/comments/comments/noapproved', 'id'=>$comment->id),
	    			'class' => 'btn noapproved',
	    			'confirm'=>'Подтвердите cнятие с публикации отзыва',
	    			'title'=>'Снять с публикации'));
				}
 			?>

			<?php echo CHtml::link('',array('/comments/comments/delete', 'id'=>$comment->id), array(
   			 'submit'=>array('/comments/comments/delete', 'id'=>$comment->id),
    			'class' => 'btn delete','confirm'=>'Подтвердите удаление'
 			))?>
  		</span>
		</div>
	</div>
</div>
