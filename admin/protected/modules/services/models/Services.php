<?php

/**
 * This is the model class for table "services".
 *
 * The followings are the available columns in table 'services':
 * @property integer $id
 * @property string $name
 * @property string $text
 */
class Services extends CActiveRecord
{
	public $img1;
	public $img2;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Services the static model class
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
		return 'services';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, text', 'required'),
			array('name', 'length', 'max'=>30),
			array('show, sort', 'numerical'),
			array('description_meta, keywoards, title, url, image1, image2', 'length', 'max'=>5000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, text, show, description_meta, keywoards, title, sort', 'safe', 'on'=>'search'),
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
			'name' => 'Название услуги',
			'text' => 'Описание услиги',
			'show'=>'Отоброжать на сайте',
			'sort'=>'Порядок сортировки',
			'description_meta'=>'Описание meta',
			'keywoards'=>'Ключевые слова',
			'title'=>'Заголовок страницы',
			'url' => 'Alias товара:',
			'image1'=>'Главное изображение',
			'image2'=>'Дополнительное изображение',
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
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	static function getServices($show=null){
		$criteria=new CDbCriteria();
		if($show!=null){
			$criteria->addCondition('t.show= :show');
			$criteria->params=array(':show'=>$show);
		}
		return self::model()->findAll($criteria);
	}
	
	static function getCounts(){
		$criteria=new CDbCriteria();
		$counts=array();
		//all
		$counts['all']=self::model()->count();
		//show
		$criteria->addCondition('t.show= 1');
		$counts['show']=self::model()->count($criteria);
		//notshow
		$criteria=new CDbCriteria();
		$criteria->addCondition('t.show= 0');
		$counts['nshow']=self::model()->count($criteria);
		return $counts;
	}
}