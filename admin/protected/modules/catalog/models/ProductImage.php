<?php

/**
 * This is the model class for table "product_image".
 *
 * The followings are the available columns in table 'product_image':
 * @property integer $id
 * @property integer $prod_id
 * @property string $image_name
 * @property integer $show
 * @property string $name
 * @property string $description
 */
class ProductImage extends CActiveRecord
{
	
	public $img;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductImage the static model class
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
		return 'product_image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('prod_id, image_name, show', 'required'),
			array('prod_id, show', 'numerical', 'integerOnly'=>true),
			array('image_name', 'length', 'max'=>120),
			array('name, keywoards, title', 'length', 'max'=>100),
			array('description_meta, description', 'length', 'max'=>5000),
				
				
				
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, prod_id, image_name, show, name, description, description_meta, keywoards, title', 'safe', 'on'=>'search'),
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
				'prod'=>array(self::BELONGS_TO, 'Product', 'prod_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'prod_id' => 'Prod',
			'image_name' => 'Фото',
			'show' => 'Отоброжать на сайте',
			'name' => 'Alt',
			'description' => 'Описание изображения',
			'keywoards'=>'Ключевые слова', 
			'title'=>'Заголовок страницы',
			'description_meta'=>'Описание страницы',
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
		$criteria->compare('prod_id',$this->prod_id);
		$criteria->compare('image_name',$this->image_name,true);
		$criteria->compare('show',$this->show);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	static function getProductImage($prodId=0){
		$criteria=new CDbCriteria();
		$criteria->addCondition("prod_id = :pid");
		$criteria->params=array(":pid"=>$prodId);
		return self::model()->findAll($criteria);
	}
}