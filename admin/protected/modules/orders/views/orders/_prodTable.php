<div class="table cell8">
						
							<div class="thead">
								<div class="row">
									<div class="tablecell cell">Фото</div>
									<div class="tablecell cell5 sliding">Название</div>
									<div class="tablecell cell">Опубликованно</div>
									<div class="tablecell cell">Действия</div>
								</div>
							</div>
							<div class="tbody">
	<?php 
			for($i=0;$i<count($prods);$i++){
				echo $this->renderPartial('_prodLine', array('prod'=>$prods[$i], 'pos'=>($i+1)));
}
?>
							</div>
						</div>
					</div>