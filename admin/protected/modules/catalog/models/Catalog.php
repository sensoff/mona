<?php

/**
 * This is the model class for table "catalog".
 *
 * The followings are the available columns in table 'catalog':
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property integer $seo_id
 */
class Catalog extends CActiveRecord
{
	
	public $childs;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Catalog the static model class
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
		return 'catalog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('seo_id', 'numerical', 'integerOnly'=>true),
			array('name, url', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, url, seo_id', 'safe', 'on'=>'search'),
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
				'category'=>array(self::HAS_MANY, 'Category', 'catalog_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
			'url' => 'Url',
			'seo_id' => 'Seo',
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('seo_id',$this->seo_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	static function getAllCatalogs(){
		$catalogs=self::model()->with('category')->findAll();
		$categories=Category::model()->findAll();
		for ($i=0;$i<count($catalogs);$i++){
			$catalogs[$i]->getAllChilds($categories);
		}
		return $catalogs;
	}
	
	function getAllChilds($categories=null){
		if(!$categories){
			$categories=Category::model()->findAll();
		}
		$res=array();
		for($i=0;$i<count($categories);$i++){
			if($categories[$i]->catalog_id==$this->id && $categories[$i]->parent_category==0){
				$childs=$categories[$i]->getChilds($categories);
				$categories[$i]->childs=$childs;
				$res[]=$categories[$i];
			}
		}
		$this->childs=$res;
	}
	
	static function getCatalogs(){
		return self::model()->findAll();
	}
	
	static function getSelectedCatalog(&$catalogs, $catalogid) {
		$selCatalog=null;
		for ( $i = 0; $i < count( $catalogs ); $i++ ) {
			if( $catalogs[$i]->id === $catalogid ) {
				$selCatalog = $catalogs[$i];
				unset( $catalogs[$i] );
				break;
			}
		}
		if( $selCatalog == null && count( $catalogs ) > 0 ){
			$selCatalog = $catalogs[0];
			unset( $catalogs[0] );
		}
		return $selCatalog;
	}
	
}