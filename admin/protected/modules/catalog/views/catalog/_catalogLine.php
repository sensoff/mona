<?php
echo '<tr>
									<td>'.$num.'</td>
									<td>'.$catalog->name.'</td>
									<td>
										<a href="'.CHtml::normalizeUrl(array('category/create', 'catalogid'=>$catalog->id)).'" class="rewiew"></a>
										<a href="'.CHtml::normalizeUrl(array('catalog/update', 'id'=>$catalog->id)).'" class="edit"></a>
										'.CHtml::link('',array('catalog/delete', 'id'=>$catalog->id), array(
    'submit'=>array('catalog/delete', 'id'=>$catalog->id),
    'class' => 'delete','confirm'=>'This will remove the catalog. Are you sure?'
  )).'
									</td>
								</tr>';
if(count($catalog->childs)){
	$childs=$catalog->childs;
	for($i=0;$i<count($childs);$i++){
		echo $this->renderPartial('_categoryLine', array('category'=>$childs[$i], 'num'=>$num.'.'.($i+1)));
	}
}