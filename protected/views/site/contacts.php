				<div id="content">
					<div class="conteiner">
						<div class="slider" id="slider1">
							<?php echo $contacts->map?>
						</div>
					</div>
					
					<div class="conteiner">
						<div class="phone">
							<div class="line">
								<div class="left">
									MTС
								</div>
								<div class="right">
									<?php echo $params[2]->value?>
								</div>
							</div>
							<div class="line">
								<div class="left">
									Velcom
								</div>
								<div class="right">
									<?php echo $params[3]->value?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="conteiner">
						<div class="adress">
							<?php if($this->lang==1){
								 echo $params[4]->value;
							};
							if($this->lang==2){
								 echo $params[5]->value;
							};
							if($this->lang==3){
								 echo $params[6]->value;
							};?>
						</div>
					</div>
					
					<div class="conteiner">
						<div class="grafic">
							<div class="days">
							<?php 
							$temp=array('one', 'thow', 'three', 'four', 'five', 'six', 'seven');
							$st=5;
							for($i=0;$i<7;$i++){

								if($days->__get($temp[$i].'_day_start')=="" && $days->__get($temp[$i].'_day_end')=="") {
									$day="off";
									$str="day off";
								} else {
									$day="";
									$str=$days->__get($temp[$i].'_day_start').'-'.$days->__get($temp[$i].'_day_end');
								}
								?>
								<div class="day <?php echo $day; ?>" title="<?php echo $this->words[$st]->__get('lang'.$this->lang)?>: <?php echo $str?>"></div>
								<?php 
								$st++;
							}?>
							</div>
							<div class="days_text">
								TU.-SA.:
							</div>
							<div class="days_time">
								10:00-18:00
							</div>
						</div>
					</div>
					
					<div class="conteiner">
						<div class="custom_contacts">
							<div class="line">
								email: <?php echo $params[0]->value?>
							</div>
							<div class="line">
								<?php echo $params[1]->value?>
							</div>
						</div>
					</div>
				</div>