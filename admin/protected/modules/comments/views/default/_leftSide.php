				<div class="stat">

					<a href="<?php echo CHtml::normalizeUrl(array('comments/index'))?>" class="line block2 btn">
						<span class="name">
							Все отзывы
						</span>
						<span class="value"><?php echo $counts['all']?></span>
					</a>
					<a href="<?php echo CHtml::normalizeUrl(array('comments/index', 'show'=>0))?>" class="line block2 btn">
						<span class="name">
							Новые отзывы:
						</span>
						<span class="value"><?php echo $counts['nshow']?></span>
					</a>
					<a href="<?php echo CHtml::normalizeUrl(array('comments/index', 'show'=>1))?>" class="line block2 btn">
						<span class="name">
							Опубликованные отзывы:
						</span>
						<span class="value"><?php echo $counts['show']?></span>
					</a>
				</div>
