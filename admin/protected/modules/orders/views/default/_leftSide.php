				<div class="stat">

					<a href="<?php echo CHtml::normalizeUrl(array('orders/index'))?>" class="line block2 btn">
						<span class="name">
							Все заказы
						</span>
						<span class="value"><?php echo $counts['all']?></span>
					</a>
					<a href="<?php echo CHtml::normalizeUrl(array('orders/index', 'show'=>0))?>" class="line block2 btn">
						<span class="name">
							Новые заказы:
						</span>
						<span class="value"><?php echo $counts['nshow']?></span>
					</a>
					<a href="<?php echo CHtml::normalizeUrl(array('orders/index', 'show'=>1))?>" class="line block2 btn">
						<span class="name">
							Проверенные заказы:
						</span>
						<span class="value"><?php echo $counts['show']?></span>
					</a>
				</div>
