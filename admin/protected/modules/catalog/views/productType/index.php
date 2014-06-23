<?php
/* @var $this ProductTypeController */
/* @var $dataProvider CActiveDataProvider */
?>
<div class="conteiner">
				<div class="left2">
				<?php $this->widget('application.components.leftMenu', array('menu'=>CatalogModule::leftMenu())); ?>
				<?php $this->widget('application.components.leftMenu', array('menu'=>CatalogModule::getCategoryMenu())); ?>
				</div>
				<div class="center2">
					<div class="conteiner">
						<div class="center">
							<div class="statistics">Всего типов товаров: <strong>10</strong></div>
						</div>
						<div class="right">
							<a href="<?php echo CHtml::normalizeUrl(array('ProductType/create'))?>" class="add_new" title="Добавить тип товара">Добавить тип</a>
						</div>
					</div>
					
					<div class="otstup conteiner"></div>
					
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
							for($i=0;$i<count($types);$i++){
								echo $this->renderPartial('_ptLine',array('type'=>$types[$i]));
							}
							
							?>

							</tbody>
						</table>
					</div>
					
					<div class="conteiner">
						<div class="postr">
							<a href="#" class="a str_a">1</a>
							<a href="#" class="str_a">2</a>
							<a href="#" class="str_a">3</a>
							<a href="#" class="str_a">4</a>
							<a href="#" class="str_a">5</a>
							<span>...</span>
							<a href="#" class="str_a">7</a>					
						</div>
					</div>
					</div>
					</div>
					
				