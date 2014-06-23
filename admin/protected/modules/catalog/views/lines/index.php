<?php
/* @var $this LinesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lines',
);

$this->menu=array(
	array('label'=>'Create Lines', 'url'=>array('create')),
	array('label'=>'Manage Lines', 'url'=>array('admin')),
);
?>

<h1>Lines</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
