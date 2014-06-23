
					<div class="stat language">
					<?php for($i=0;$i<count($langs);$i++) {?>
						<div class="line block2 btn<?php
						echo ' ' . $langs[$i]->name;
						if($i===0) { 
							echo ' active';
						} 
						?>" atr="<?php echo $langs[$i]->name; ?>"
						>
							<span class="image">
								<img src="<?php echo Yii::app()->baseUrl.'/images/language/'.$langs[$i]->img?> ">
							</span>
							<span class="value">
								<?php echo $langs[$i]->description ?>
							</span>
						</div>
						<?php }?>
					</div>