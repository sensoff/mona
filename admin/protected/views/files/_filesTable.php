<div class="table cell8">
	<div class="thead">
		<div class="row">
			<div class="tablecell cell">Фото</div>
		  <div class="tablecell cell6 sliding">Файл</div>
			<div class="tablecell cell">Действие</div>
		</div>
	</div>
  <div class="tbody">
  	<?php
			if (count($files) == 0) {
				echo '<div class="conteiner" style="tesxt-align: center; padding: 33px 0;"> В данном разделе пока пусто</div>';
			} else {
				for($i=0;$i<count($files);$i++) {
					$this->renderPartial('_filesLine', array('file'=>$files[$i], 'pos'=>($i+1)));
				}
			}
		?>
	</div>
</div>
