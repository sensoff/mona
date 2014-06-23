				<div class="stat">
					<?php
						if(!empty($selCatalog)){
						// !todom Сделать класс Active css
					?>

					<a href="<?php echo CHtml::normalizeUrl(array('/catalog/category/index', 'catalog'=>$selCatalog->id))?>" class="line block2 btn">
						<span class="name">
							<?php echo $selCatalog->name; ?>:
						</span>
						<span class="value"><?php echo $counts['all']?></span>
					</a>
					<a href="<?php echo CHtml::normalizeUrl(array('/catalog/category/index', 'show'=>0, 'catalog'=>$selCatalog->id))?>" class="line block2 btn">
						<span class="name">
							Неопубликованные каталоги:
						</span>
						<span class="value"><?php echo $counts['nshow']?></span>
					</a>
					<a href="<?php echo CHtml::normalizeUrl(array('/catalog/category/index', 'show'=>1, 'catalog'=>$selCatalog->id))?>" class="line block2 btn">
						<span class="name">
							Опубликованные каталоги:
						</span>
						<span class="value"><?php echo $counts['show']?></span>
					</a>

					<?php
						}
						if(count($catalogs>0)){
							foreach ($catalogs as $item){
					?>
						<a href="<?php echo CHtml::normalizeUrl(array('/catalog/category/index', 'catalog'=>$item->id))?>" class="line block2 btn">
							<span class="name">
								<?php echo $item->name; ?>
							</span>
						</a>
					<?php }
						}?>
				</div>
