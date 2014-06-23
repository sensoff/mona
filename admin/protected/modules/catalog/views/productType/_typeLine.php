<tr>
									<td><?php echo $type->lable?></td>
									<td>
										<a href="<?php echo CHtml::normalizeUrl(array('ProdElementType/view', 'id'=>$type->id))?>" class="rewiew"></a>
										<a href="<?php echo CHtml::normalizeUrl(array('ProdElementType/update', 'id'=>$type->id))?>" class="edit"></a>
										<?php echo CHtml::link('',array('ProdElementType/delete', 'id'=>$type->id), array(
    'submit'=>array('ProdElementType/delete', 'id'=>$type->id),
    'class' => 'delete','confirm'=>'This will remove the image. Are you sure?'
  ))?>
									</td>
								</tr>