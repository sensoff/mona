<div class="table block5">
						
							<div class="thead">
								<div class="row">
									<div class="tablecell cell">Позиция</div>
									<div class="tablecell cell3">Название</div>
									<div class="tablecell cell">Действия</div>
								</div>
							</div>
							<div class="tbody">
	<?php 
			for($i=0;$i<count($services);$i++){
				echo $this->renderPartial('_line', array('service'=>$services[$i], 'pos'=>($i+1)));
}
?>
							</div>
						</div>
					</div>