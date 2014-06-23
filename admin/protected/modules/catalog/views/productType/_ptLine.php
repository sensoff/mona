
<tr>
<td><?php echo $type->name;?></td>
<td>
<a href="<?php echo CHtml::normalizeUrl(array('ProductType/view', 'id'=>$type->id))?>" class="rewiew"></a>
<a href="<?php echo CHtml::normalizeUrl(array('ProductType/update', 'id'=>$type->id))?>" class="edit"></a>
<?php echo CHtml::link('',array('ProductType/delete', 'id'=>$type->id), array(
    'submit'=>array('ProductType/delete', 'id'=>$type->id),
    'class' => 'delete','confirm'=>'This will remove the image. Are you sure?'
  ))?>
</td>
</tr>