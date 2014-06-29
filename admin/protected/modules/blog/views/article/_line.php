<div class="row">
	<div class="tablecell cell">
		<div class="tcontent">
			<span class="cell_name">Дата: </span>
			<span class="cell_value"><?php echo $article->create_date ?></span>
		</div>
	</div>

	<div class="tablecell cell6 sliding">
		<div class="tcontent">
			<span class="cell_name">Новость: </span>
			<span class="cell_value">
				<?php
					$news_length = 150;
					$news_text = $article->main_text_lang1;
					if (strlen($news_text) > $news_length) {
						for($i=0; $i<strlen($article->main_text_lang1); $i++) {
							echo $news_text[$i];
						}
						echo '...';
					} else {
						echo $article->main_text_lang1;
					}
				?>

			</span>
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
