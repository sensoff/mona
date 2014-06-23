<div class="table cell8">
						
							<div class="thead">
								<div class="row">
									<div class="tablecell cell">Позиция</div>
									<div class="tablecell cell6 sliding">Название</div>
								
									<div class="tablecell cell">Действия</div>
								</div>
							</div>
							<div class="tbody">
	<?php 
			for($i=0;$i<count($articles);$i++){
				echo $this->renderPartial('_line', array('article'=>$articles[$i], 'pos'=>($i+1)));
}
?>
							</div>
						</div>
					</div>