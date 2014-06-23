<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $name
 * @property integer $parent_category
 * @property integer $catalog_id
 * @property string $url
 * @property integer $seo_id
 */
class Category extends CActiveRecord
{

	public $childs;
	public $img1;

	function getChildList(){
		return $this->childs;
	}

	function setChildList($list){
		$this->childs=$list;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_lang1,  catalog_id, image1, url', 'required'),
			array('parent_category, catalog_id, show', 'numerical', 'integerOnly'=>true),
			array('name_lang1, name_lang2, name_lang3, url, image1', 'length', 'max'=>100),
			array('description_lang1, description_lang2, description_lang3, description_meta_lang1, description_meta_lang2, description_meta_lang3, title_lang1, title_lang2, title_lang3', 'length', 'max'=>5000),
			array('url', 'unique', 'message'=>'Запись с таким именем уже существует.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description, name, parent_category, show, catalog_id, url, description_meta, title, keywoards', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'catalog'=>array(self::BELONGS_TO, 'Catalog', 'catalog_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		//$langs=Lang::getLangs();
		return array(
			'id' => 'ID',
			'name_lang1' => '<strong style="font-size: 16px;">Название каталога</strong>',
			'name_lang2' => '<strong style="font-size: 16px;">Название каталога</strong>',
			'name_lang3' => '<strong style="font-size: 16px;">Название каталога</strong>',
			'parent_category' => 'Родительская категория',
			'catalog_id' => 'Catalog',
			'url' => 'Alias ("ссылка на каталог")',
			'description_meta_lang1'=>'Description',
			'description_meta_lang2'=>'Description',
			'description_meta_lang3'=>'Description',
			'title_lang1'=>'Заголовок страницы',
			'title_lang2'=>'Заголовок страницы',
			'title_lang3'=>'Заголовок страницы',
			'keywoards'=>'Ключевые слова',
			'seo_id' => 'Seo',
			'image1' => 'Фото каталога',
			'image2' => 'Дополнительное изображение',
			'description_lang1'=>'О каталоге',
			'description_lang2'=>'О каталоге',
			'description_lang3'=>'О каталоге',
			'show'=>'Отоброжать на сайте',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('parent_category',$this->parent_category);
		$criteria->compare('catalog_id',$this->catalog_id);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('seo_id',$this->seo_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	function getChilds($list){
		$childs=array();
		$res=array();
		for($i=0;$i<count($list);$i++){
			if($list[$i]->parent_category==$this->id){
				$category=new Category();
				$category->id=$list[$i]->id;
				$category->name=$list[$i]->name;
				$childs=$category->getChilds($list);
				if(count($childs)){
					$category->childs=$childs;
				}
				$res[]=$category;
			}
		}
		return $res;
	}

	static function getCategories($catalogid=0, $show=null){
		$criteria=new CDbCriteria();
		if($catalogid!=0){
			$criteria->addCondition('catalog_id = :cid');
			$criteria->params=array(':cid'=>$catalogid);
		}
		if($show!=null){

			$criteria->addCondition('t.show= :show');
			$criteria->params[':show']=$show;
		}
		return self::model()->findAll($criteria);
	}

	static function getCatalogCategories($catalogId=0, $show=null){
		$criteria=new CDbCriteria();
		$criteria->addCondition("catalog_id=:catid");
		$criteria->params = array(':catid' => $catalogId);

		return self::model()->findAll($criteria);
	}

	static function getCounts( $catalog ){
		$counts=array();
		//all
		$criteria=new CDbCriteria();
		$criteria->addCondition( 'catalog_id = :catalog' );
		$criteria->params=array(':catalog'=>$catalog);
		$counts['all']=Category::model()->count($criteria);
		//show
		$criteria=new CDbCriteria();
		$criteria->addCondition("t.show = :show");
		$criteria->addCondition( 'catalog_id = :catalog' );
		$criteria->params=array(':show'=>1, ':catalog'=>$catalog);
		$counts['show']=Category::model()->count($criteria);
		//notshow
		$criteria=new CDbCriteria();
		$criteria->addCondition( 'catalog_id = :catalog' );
		$criteria->addCondition("t.show = :show");
		$criteria->params=array(':show'=>0, ':catalog'=>$catalog);
		$counts['nshow']=Category::model()->count($criteria);
		return $counts;
	}

	static public function getSelectedCategoru(&$categorys, $catagoryid) {
		$selcategory=null;
		for($i=0;$i<count($categorys);$i++){
			if($categorys[$i]->id === $catagoryid) {
				$selcategory = $categorys[$i];
				unset($categorys[$i]);
				break;
			}
		}
		if($selcategory===null && count($categorys)>0) {
			$selcategory=$categorys[0];
			unset($categorys[0]);
		}
		return $selcategory;
	}
}
