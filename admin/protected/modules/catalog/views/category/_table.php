<div class="table cell8">

							<div class="thead">
								<div class="row">
									<div class="tablecell cell">Позиция</div>
									<div class="tablecell cell6 sliding">Имя</div>
									<div class="tablecell cell">Действия</div>
								</div>
							</div>
							<div class="tbody">
	<?php
			if (count($categories) == 0) {
				echo '<div class="conteiner" style="tesxt-align: center; padding: 33px 0;"> В данном разделе пока пусто</div>';
			} else {
				for($i=0;$i<count($categories);$i++){
					echo $this->renderPartial('_line', array('categorie'=>$categories[$i], 'pos'=>($i+1)));
				}
			}
?>
							</div>
						</div>
					</div>
