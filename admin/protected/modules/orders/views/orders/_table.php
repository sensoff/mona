<div class="table cell8">

							<div class="thead">
								<div class="row">
									<div class="tablecell cell">Дата</div>
									<div class="tablecell cell">Пользователь</div>
									<div class="tablecell cell4 sliding">Номер телефона</div>
									<div class="tablecell cell sliding">Проверено</div>
									<div class="tablecell cell">Действия</div>
								</div>
							</div>
							<div class="tbody">
	<?php
			if (count($orders) == 0) {
				echo '<div class="conteiner" style="tesxt-align: center; padding: 33px 0;"> В данном разделе пока пусто</div>';
			} else {
				for($i=0;$i<count($orders);$i++){
					echo $this->renderPartial('_line', array('order'=>$orders[$i], 'pos'=>($i+1)));
				}
			}

?>
							</div>
						</div>
					</div>
