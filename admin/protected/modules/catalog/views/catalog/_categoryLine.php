<?php
echo '<tr>
									<td class="level2">'.$num.'</td>
									<td class="level2">'.$category->name.'</td>
									<td>
										<a href="#" class="rewiew"></a>
										<a href="'.CHtml::normalizeUrl(array('category/update', 'id'=>$category->id)).'" class="edit"></a>
										'.CHtml::link('',array('category/delete', 'id'=>$category->id), array(
    'submit'=>array('category/delete', 'id'=>$category->id),
    'class' => 'delete','confirm'=>'This will remove the image. Are you sure?'
  )).'
									</td>
								</tr>';