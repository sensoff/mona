<div class="conteiner">
	<div class="table cell8">
		<div class="thead">
			<div class="row">
  			<div class="tablecell cell">
					<div class="tcontent">
						Цена
					</div>
				</div>
				<div class="tablecell cell5 sliding">
					<div class="tcontent">
						Фото
					</div>
				</div>
				<div class="tablecell cell">
					<div class="tcontent">
						Опубликован
					</div>
				</div>
				<div class="tablecell cell">
					<div class="tcontent">
						Действие
					</div>
	  		</div>
			</div>
		</div>
		<div class="tbody">
			<?php
				if (count($slider) == 0) {
					echo '<div class="conteiner" style="tesxt-align: center; padding: 33px 0;"> В данном разделе пока пусто</div>';
				} else {
					for ($i=0;$i<count($slider);$i++){
						$this->renderPartial('_line', array('slide'=>$slider[$i]));
					}
				}
			?>
  	</div>
	</div>
</div>
