<div class="table cell8">

							<div class="thead">
								<div class="row">
									<div class="tablecell cell">Дата</div>
									<div class="tablecell cell5 sliding">Отзыв</div>
									<div class="tablecell cell">Опубликовано</div>
									<div class="tablecell cell">Действия</div>
								</div>
							</div>
							<div class="tbody">
	<?php
			if (count($comments) == 0) {
				echo '<div class="conteiner" style="tesxt-align: center; padding: 33px 0;"> В данном разделе пока пусто</div>';
			} else {
				for($i=0;$i<count($comments);$i++){
					echo $this->renderPartial('_line', array('comment'=>$comments[$i], 'pos'=>($i+1)));
				}
			}
?>
							</div>
						</div>
					</div>
