	<div class="row">
								
								<div class="tablecell cell">
									<div class="tcontent">
										<span class="cell_name">Фото: </span>
										<span class="cell_value">
											<img src="<?php echo Yii::app()->params['imagePath'].'slider/'.$slide->file?>">
										</span>
									</div>
								</div>
								<div class="tablecell cell5 sliding">
									<div class="tcontent small">
										<span class="cell_name">Ссылка: </span>
										<span class="cell_value">
											<?php echo $slide->url?>
										</span>
									</div>
								</div>
								<div class="tablecell cell">
									<div class="tcontent">
										<span class="cell_name">Опубликован: </span>
										<span class="cell_value"><?php if($slide->show==1){echo 'да';}else{echo 'нет';}?></span>
									</div>
								</div>
								<div class="tablecell cell">
									<div class="tcontent">
										<span class="actions">
											<a class="btn edit" href="<?php echo CHtml::normalizeUrl(array('/slider/update', 'id'=>$slide->id))?>"></a>
												<?php echo CHtml::link('',array('/slider/delete', 'id'=>$slide->id), array(
    'submit'=>array('/slider/delete', 'id'=>$slide->id),
    'class' => 'delete','confirm'=>'Удалить слайд?'));?>	
										</span>
									</div>
								</div>
							</div>