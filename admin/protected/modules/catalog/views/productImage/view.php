<?php
/* @var $this ProductImageController */
/* @var $model ProductImage */
$this->breadcrumbs=array(
		$model->prod->name=>CHtml::normalizeUrl(array('/catalog/product/view', 'id'=>$model->prod->id)),
		'фото',
);
?>

<img src="<?php echo Yii::app()->params['parenthost']."images/product/".$model->image_name?>"/>
