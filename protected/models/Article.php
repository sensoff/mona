<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $id
 * @property string $name_lang1
 * @property string $name_lang2
 * @property string $name_lang3
 * @property integer $blog_id
 * @property string $pre_text
 * @property string $main_text_lang1
 * @property string $create_date
 * @property integer $show
 * @property string $alias
 * @property string $description_meta_lang1
 * @property string $description_meta_lang2
 * @property string $description_meta_lang3
 * @property string $title_lang1
 * @property string $title_lang2
 * @property string $title_lang3
 * @property string $keywoards * @property string $main_text_lang2
 * @property string $main_text_lang3
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
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
		return 'article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_lang1, name_lang2, name_lang3, blog_id, pre_text, main_text_lang1, create_date, show, alias, description_meta_lang1, description_meta_lang2, description_meta_lang3, title_lang1, title_lang2, title_lang3, keywoards, main_text_lang2, main_text_lang3', 'required'),
			array('blog_id, show', 'numerical', 'integerOnly'=>true),
			array('name_lang1', 'length', 'max'=>50),
			array('alias', 'length', 'max'=>100),
			array('title_lang1, title_lang2, title_lang3, keywoards', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name_lang1, name_lang2, name_lang3, blog_id, pre_text, main_text_lang1, create_date, show, alias, description_meta_lang1, description_meta_lang2, description_meta_lang3, title_lang1, title_lang2, title_lang3, keywoards, main_text_lang2, main_text_lang3', 'safe', 'on'=>'search'),
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
			'blog_id' => 'Blog',
			'pre_text' => 'Pre Text',
			'main_text_lang1' => 'Main Text Lang1',
			'create_date' => 'Create Date',
			'show' => 'Show',
			'alias' => 'Alias',
			'description_meta_lang1' => 'Description Meta Lang1',
			'description_meta_lang2' => 'Description Meta Lang2',
			'description_meta_lang3' => 'Description Meta Lang3',
			'title_lang1' => 'Title Lang1',
			'title_lang2' => 'Title Lang2',
			'title_lang3' => 'Title Lang3',
			'keywoards' => 'Keywoards',
			'main_text_lang2' => 'Main Text Lang2',
			'main_text_lang3' => 'Main Text Lang3',
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
		$criteria->compare('blog_id',$this->blog_id);
		$criteria->compare('pre_text',$this->pre_text,true);
		$criteria->compare('main_text_lang1',$this->main_text_lang1,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('show',$this->show);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('description_meta_lang1',$this->description_meta_lang1,true);
		$criteria->compare('description_meta_lang2',$this->description_meta_lang2,true);
		$criteria->compare('description_meta_lang3',$this->description_meta_lang3,true);
		$criteria->compare('title_lang1',$this->title_lang1,true);
		$criteria->compare('title_lang2',$this->title_lang2,true);
		$criteria->compare('title_lang3',$this->title_lang3,true);
		$criteria->compare('keywoards',$this->keywoards,true);
		$criteria->compare('main_text_lang2',$this->main_text_lang2,true);
		$criteria->compare('main_text_lang3',$this->main_text_lang3,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	static function getArticleById($id){
		if (!empty($id)) {
			$criteria = new CDbCriteria();
			$criteria->addCondition('id = :id');
			$criteria->params=array(':id'=>$id);
			return self::model()->find($criteria);
		} else {
			return null;
		}
	}
}