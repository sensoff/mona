<div class="row">
								<div class="tablecell cell">
									<div class="tcontent">
										<span class="cell_name">Позиция: </span>
										<span class="cell_value"><?php echo $pos?></span>
									</div>
								</div>
								<div class="tablecell cell3">
									<div class="tcontent">
										<span class="cell_name">Фото: </span>
										<span class="cell_value">
											<img src="<?php echo Yii::app()->params['imagePath'].'products/small/'.$image->image_name?>">
										</span>
									</div>
								</div>
								<div class="tablecell cell">
									<div class="tcontent">
										<span class="actions">
											<?php echo CHtml::link('',array('/catalog/ProductImage/delete', 'id'=>$image->id), array(
   			 'submit'=>array('/catalog/ProductImage/delete', 'id'=>$image->id),
    			'class' => 'btn delete','confirm'=>'Подтвердите удаление'
 				 ))?>
										</span>
									</div>
								</div>
							</div>