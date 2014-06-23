<tr>
									<td class="level2"><?php echo $num?></td>
									<td class="level2"><?php echo $category->name?></td>
									<td>
										<a href="<?php echo CHtml::normalizeUrl(array('/catalog/category/update', 'id'=>$category->id ))?>" class="edit">редактировать</a>
										<?php echo CHtml::link('удалить',array('/catalog/category/delete', 'id'=>$category->id), array(
    'submit'=>array('/catalog/category/delete', 'id'=>$category->id),
    'class' => 'delete','confirm'=>'This will remove the image. Are you sure?'));?>	
									</td>
								</tr>