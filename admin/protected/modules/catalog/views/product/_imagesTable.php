<div class="conteiner">
					<div class="table block5">
						<div class="thead">
							<div class="row">
								<div class="tablecell cell">
									<div class="tcontent">
										Позиция
									</div>
								</div>
								<div class="tablecell cell3">
									<div class="tcontent">
										Фото
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
							for($i=0;$i<count($images);$i++){
								$this->renderPartial('_imagesLine', array('image'=>$images[$i], 'pos'=>($i+1)));
							}
							?>
							
						</div>
					</div>
				</div>