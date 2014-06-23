<div class="slide<?php echo $class ?>" style="left: <?php echo $left?> ">
										<a href="<?php echo Yii::app()->baseUrl?>/artists/<?php echo $master->url ?>" class="artist">
											<img src="<?php echo Yii::app()->baseUrl?>/images/catalog/<?php echo $master->image1 ?>" alt="name">

											<span class="name">
												<span><?php echo $master->__get('name_lang'.$this->lang);
												// !todo: hardcode lang
												?></span>
											</span>
										</a>
									</div>