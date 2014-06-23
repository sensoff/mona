<div class="conteiner">
						<table>
							<thead>
								<tr>
									<th class="name_menu">Название</th>
									<th class="actions">Действия</th>
								</tr>
							</thead>
							<tbody>

							<?php 
							for($i=0;$i<count($values);$i++){
								echo $this->renderPartial("_valueLine", array('value'=>$values[$i]));
							}
							
							?>
							</tbody>
						</table>
					</div>