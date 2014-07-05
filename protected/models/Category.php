<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $name_lang1
 * @property string $name_lang2
 * @property string $name_lang3
 * @property integer $parent_category
 * @property integer $catalog_id
 * @property string $image1
 * @property string $url
 * @property integer $position
 * @property string $description_lang1
 * @property string $description_lang2
 * @property string $description_lang3
 * @property integer $show
 * @property string $description_meta_lang1
 * @property string $description_meta_lang2
 * @property string $description_meta_lang3
 * @property string $title_lang1
 * @property string $title_lang2
 * @property string $title_lang3
 * @property string $keywoards
 * @property string $keywoards_lang2
 * @property string $keywoards_lang3
 */
class Category extends CActiveRecord
{
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
			array('name_lang1, name_lang2, name_lang3, parent_category, catalog_id, image1, url, position, description_lang1, description_lang2, description_lang3, show, description_meta_lang1, description_meta_lang2, description_meta_lang3, title_lang1, title_lang2, title_lang3, keywoards, keywoards_lang2, keywoards_lang3', 'required'),
			array('parent_category, catalog_id, position, show', 'numerical', 'integerOnly'=>true),
			array('name_lang1, name_lang2, name_lang3, keywoards_lang2, keywoards_lang3', 'length', 'max'=>255),
			array('image1', 'length', 'max'=>40),
			array('url', 'length', 'max'=>50),
			array('title_lang1, title_lang2, title_lang3', 'length', 'max'=>100),
			array('keywoards', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name_lang1, name_lang2, name_lang3, parent_category, catalog_id, image1, url, position, description_lang1, description_lang2, description_lang3, show, description_meta_lang1, description_meta_lang2, description_meta_lang3, title_lang1, title_lang2, title_lang3, keywoards, keywoards_lang2, keywoards_lang3', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name_lang1' => 'Name Lang1',
			'name_lang2' => 'Name Lang2',
			'name_lang3' => 'Name Lang3',
			'parent_category' => 'Parent Category',
			'catalog_id' => 'Catalog',
			'image1' => 'Image1',
			'url' => 'Url',
			'position' => 'Position',
			'description_lang1' => 'Description Lang1',
			'description_lang2' => 'Description Lang2',
			'description_lang3' => 'Description Lang3',
			'show' => 'Show',
			'description_meta_lang1' => 'Description Meta Lang1',
			'description_meta_lang2' => 'Description Meta Lang2',
			'description_meta_lang3' => 'Description Meta Lang3',
			'title_lang1' => 'Title Lang1',
			'title_lang2' => 'Title Lang2',
			'title_lang3' => 'Title Lang3',
			'keywoards' => 'Keywoards',
			'keywoards_lang2' => 'Keywoards Lang2',
			'keywoards_lang3' => 'Keywoards Lang3',
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
		$criteria->compare('name_lang1',$this->name_lang1,true);
		$criteria->compare('name_lang2',$this->name_lang2,true);
		$criteria->compare('name_lang3',$this->name_lang3,true);
		$criteria->compare('parent_category',$this->parent_category);
		$criteria->compare('catalog_id',$this->catalog_id);
		$criteria->compare('image1',$this->image1,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('description_lang1',$this->description_lang1,true);
		$criteria->compare('description_lang2',$this->description_lang2,true);
		$criteria->compare('description_lang3',$this->description_lang3,true);
		$criteria->compare('show',$this->show);
		$criteria->compare('description_meta_lang1',$this->description_meta_lang1,true);
		$criteria->compare('description_meta_lang2',$this->description_meta_lang2,true);
		$criteria->compare('description_meta_lang3',$this->description_meta_lang3,true);
		$criteria->compare('title_lang1',$this->title_lang1,true);
		$criteria->compare('title_lang2',$this->title_lang2,true);
		$criteria->compare('title_lang3',$this->title_lang3,true);
		$criteria->compare('keywoards',$this->keywoards,true);
		$criteria->compare('keywoards_lang2',$this->keywoards_lang2,true);
		$criteria->compare('keywoards_lang3',$this->keywoards_lang3,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	static public function getCategories(){
		$criteria = new CDbCriteria();
		$criteria->addCondition('t.show = 1');
		return self::model()->findAll($criteria);
	}

	static public function getByAlias($alias=null){
		$criteria=new CDbCriteria();
		$criteria->addCondition('url = :alias');
		$criteria->params[':alias']=$alias;
		return self::model()->find($criteria);
	}
	static public function getMasters(){
		$criteria = new CDbCriteria();
		$criteria->addCondition('t.show = 1');
		return self::model()->findAll($criteria);
	}
}
