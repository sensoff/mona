<div class="table block5">
						
							<div class="thead">
								<div class="row">
									<div class="tablecell cell">Позиция</div>
									<div class="tablecell cell2">Название</div>
									<div class="tablecell cell">Опубликованно</div>
									<div class="tablecell cell">Действия</div>
								</div>
							</div>
							<div class="tbody">
	<?php 
			for($i=0;$i<count($lines);$i++){
				echo $this->renderPartial('_lineline', array('line'=>$lines[$i], 'pos'=>($i+1)));
}
?>
							</div>
						</div>
					</div>