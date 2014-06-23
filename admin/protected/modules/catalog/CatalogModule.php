<?php


class CatalogModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'catalog.models.*',
			'catalog.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			//yii::import($alias)
			//require_once 'lang.php';
			
			return true;
		}
		else
			return false;
	}
	
	static function leftMenu(){
		$menuarray=array();
		$menu=new Menu();
		$menu->setName('Категории');
		$menu->setLink(CHtml::normalizeUrl(array('/catalog/catalog/index')));
		$menuarray[]=$menu;
		return $menuarray;
	}
	
	static function getCategoryMenu(){
		$catalog=Catalog::getAllCatalogs();
		$menu=Menu::modelToMenu($catalog, 'name', array('/catalog/product/index', array('classname'=>'id')), 'childs');
		return $menu;
	}
}
