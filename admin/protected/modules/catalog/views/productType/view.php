<?php
/* @var $this ProductTypeController */
/* @var $model ProductType */

?>
<div class="conteiner">
				<div class="left2">
				<?php $this->widget('application.components.leftMenu', array('menu'=>CatalogModule::leftMenu())); ?>
				<?php $this->widget('application.components.leftMenu', array('menu'=>CatalogModule::getCategoryMenu())); ?>
				</div>
				<div class="center2">
<div class="conteiner">
						<div class="center">
							<div class="statistics"><?php echo $model->name;?> </div>
						</div>
						<div class="right">
							<a href="<?php echo CHtml::normalizeUrl(array('ProdElementType/create', 'typeid'=>$model->id))?>" class="add_new" title="Добавить тип товара">Добавить характер</a>
						</div>
					</div>

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
								echo $this->renderPartial('_typeLine', array('type'=>$types[$i]));
							}
							?>

							</tbody>
						</table>
					</div>
					</div>
					</div>