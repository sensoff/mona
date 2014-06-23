<ul>
<?php 
	$res='';
	for($i=0;$i<count($catalog);$i++){
		echo "\n<li>".CHtml::link($catalog[$i]->name,array('index','catalogid'=>$catalog[$i]->id))." ".CHtml::link("+",array('category/create','catid'=>$catalog[$i]->id))."</li>";
		$category=$catalog[$i]->category;
		$cat=Category::pars($category, 0);
		$this->renderPartial('application.modules.catalog.views.category._categoryLi',array('category'=>$cat));
	}
?>
</ul>
<?php 
	echo CHtml::link("+",array('catalog/create'));
?>