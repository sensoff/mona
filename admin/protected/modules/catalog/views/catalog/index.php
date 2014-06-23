<?php
/* @var $this CatalogController */
/* @var $dataProvider CActiveDataProvider */
?><div class="conteiner">
<div class="left2">
				</div>
				<div class="center2">
	<div class="conteiner">
						<div class="center">
							<div class="statistics">Всего категорий: <strong>10</strong></div>
							<div class="statistics">Опубликованных категорий: <strong>9</strong></div>
						</div>
						<div class="right">
							<a href="<?php echo CHtml::normalizeUrl(array('catalog/create'))?>" class="add_new">Добавить категорию</a>
						</div>
					</div>
					
					<div class="otstup conteiner"></div>
<?php echo'		<div class="conteiner">
						<table>
							<thead>
								<tr>
									<th class="position">Позиция</th>
									<th class="name_menu">Название</th>
									<th class="actions">Действия</th>
								</tr>
							</thead>
							<tbody>';
for($i=0;$i<count($catalogs);$i++){
	echo $this->renderPartial('_catalogLine', array('catalog'=>$catalogs[$i], 'num'=>$i+1));
}								
				echo'			</tbody>
						</table>
					</div>';?>
					
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
					<div class="conteiner">
						<div class="right">
							<a href="<?php echo CHtml::normalizeUrl(array('/catalog/ProductType/index'))?>" class="add_new">Конфигурация</a>
						</div>
					</div>
					</div>
					</div>
					
