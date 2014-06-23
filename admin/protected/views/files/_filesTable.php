<div class="table block5">
						<div class="thead">
							<div class="row">
								<div class="tablecell cell">
									<div class="tcontent">
										Фото
									</div>
								</div>
								
								<div class="tablecell cell3">
									<div class="tcontent">
										Ссылка
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
							for($i=0;$i<count($files);$i++){
								$this->renderPartial('_filesLine', array('file'=>$files[$i], 'pos'=>($i+1)));	
							}
							?>
							
						</div>
					</div>