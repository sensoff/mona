<div class="table cell8">
	<div class="thead">
  	<div class="row">
			<div class="tablecell cell">Дата</div>
			<div class="tablecell cell6 sliding">Новость</div>
			<div class="tablecell cell">Действия</div>
		</div>
	</div>
	<div class="tbody">
		<?php
			if (count($articles) == 0) {
				echo '<div class="conteiner" style="tesxt-align: center; padding: 33px 0;"> В данном разделе пока пусто</div>';
			} else {
				for($i=0;$i<count($articles);$i++){
					echo $this->renderPartial('_line', array('article'=>$articles[$i], 'pos'=>($i+1)));
				}
			}
		?>
	</div>
</div>
