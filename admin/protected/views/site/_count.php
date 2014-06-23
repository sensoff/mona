<a href="<?php echo $elem['link']?>" class="line block2 btn">
						<span class="name">
							<?php echo $elem['name']?>
						</span>
						<span class="value">
							<?php 
							if (isset($elem['value'])){
								echo $elem['value'];
							}?>
						</span>
					</a>