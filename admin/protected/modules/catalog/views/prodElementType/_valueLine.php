<tr>
									<td><?php echo $value->value?></td>
									<td>
										<a href="<?php echo CHtml::normalizeUrl(array('ProdElementTypeValues/update', 'id'=>$value->id))?>" class="edit"></a>
										<?php echo CHtml::link('',array('ProdElementTypeValues/delete', 'id'=>$value->id), array(
    'submit'=>array('ProdElementTypeValues/delete', 'id'=>$value->id),
    'class' => 'delete','confirm'=>'This will remove the image. Are you sure?'));?>								</td>
								</tr>