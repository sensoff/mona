<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property string $name_lang1
 * @property string $name_lang2
 * @property string $name_lang3
 * @property string $description
 * @property integer $product_type_id
 * @property integer $category_id
 * @property integer $order_id
 * @property string $url
 * @property string $image
 * @property string $description_meta
 * @property string $title
 * @property integer $top
 */
class Product extends CActiveRecord
{
	const COUNT_PER_PAGE=6;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
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
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_lang1, name_lang2, name_lang3, description, product_type_id, category_id, order_id, url, description_meta, title, top', 'required'),
			array('product_type_id, category_id, order_id, top', 'numerical', 'integerOnly'=>true),
			array('name_lang1, url, image', 'length', 'max'=>50),
			array('name_lang2, name_lang3', 'length', 'max'=>255),
			array('title', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name_lang1, name_lang2, name_lang3, description, product_type_id, category_id, order_id, url, image, description_meta, title, top', 'safe', 'on'=>'search'),
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
			'cat'=>array(self::BELONGS_TO, 'Category', 'category_id'),
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
			'description' => 'Description',
			'product_type_id' => 'Product Type',
			'category_id' => 'Category',
			'order_id' => 'Order',
			'url' => 'Url',
			'image' => 'Image',
			'description_meta' => 'Description Meta',
			'title' => 'Title',
			'top' => 'Top',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('product_type_id',$this->product_type_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description_meta',$this->description_meta,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('top',$this->top);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	static public function getProducts() {
		$criteria = new CDbCriteria();
		return self::model()->findAll($criteria);
	}

	static public function getProducts2( $type = null, $master = null ) {
		$criteria = new CDbCriteria();
		if( $type !== null ){
			$criteria->addCondition("photo_type = :type");
			$criteria->params[':type'] = $type;
		}
		if( $master !== null ){
			$criteria->addCondition("category_id = :master");
			$criteria->params[':master'] = $master;
		}
		$criteria->order=" date_create DESC, t.id DESC";
		return self::model()->with('cat')->findAll($criteria);
	}

	static public function getProducts3($page, $type = null, $master = null) {

 		if(isset($type) && isset($master)){
 			$select = Yii::app()->db->createCommand()
	 			->select('p.id, p.name_lang1, p.name_lang2, p.name_lang3, c.name_lang1 as master_lang1, c.name_lang2 as master_lang2, c.name_lang3 as master_lang3, p.image tatoo_image, p.date_create, p.photo_type')
	 			->from('product p')->join('category c', 'c.id=p.category_id')
	 			->where('p.category_id=:master and p.photo_type=:type', array(':type'=>$type, ':master'=>$master))
	 			->order('p.date_create DESC, p.id DESC')
/*	 			->limit(self::COUNT_PER_PAGE)
	 			->offset(($page-1)*self::COUNT_PER_PAGE)*/
	 			->query();
 		}else{
	 		if(isset($type)){
				$select = Yii::app()->db->createCommand()
					->select('p.id, p.name_lang1, p.name_lang2, p.name_lang3, c.name_lang1 as master_lang1, c.name_lang2 as master_lang2, c.name_lang3 as master_lang3, p.image tatoo_image, p.date_create, p.photo_type')
					->from('product p')->join('category c', 'c.id=p.category_id')
					->where('p.photo_type=:type', array(':type'=>$type))
					->order('p.date_create DESC, p.id DESC')
					->limit(self::COUNT_PER_PAGE)
					->offset(($page-1)*self::COUNT_PER_PAGE)
					->query();
			}
	 		if(isset($master)){
				$select = Yii::app()->db->createCommand()
					->select('p.id, p.name_lang1, p.name_lang2, p.name_lang3, c.name_lang1 as master_lang1, c.name_lang2 as master_lang2, c.name_lang3 as master_lang3, p.image tatoo_image, p.date_create, p.photo_type')
					->from('product p')->join('category c', 'c.id=p.category_id')
					->where('p.category_id=:master', array(':master'=>$master))
					->order('p.date_create DESC, p.id DESC')
/*					->limit(self::COUNT_PER_PAGE)
					->offset(($page-1)*self::COUNT_PER_PAGE)*/
					->query();
			}
			if(!isset($type) && !isset($master)){
				$select = Yii::app()->db->createCommand()
					->select('p.id, p.name_lang1, p.name_lang2, p.name_lang3, c.name_lang1 as master_lang1, c.name_lang2 as master_lang2, c.name_lang3 as master_lang3, p.image tatoo_image, p.date_create, p.photo_type')
					->from('product p')->join('category c', 'c.id=p.category_id')
					->order('p.date_create DESC, p.id DESC')
/*					->limit(self::COUNT_PER_PAGE)
					->offset(($page-1)*self::COUNT_PER_PAGE)*/
					->query();
			}
 		}

		return $select;
	}

	public static function getCounts($master){
		$criteria= new CDbCriteria();
		$criteria->addCondition('category_id = :cid');
		$criteria->addCondition('top = 1');
		$criteria->params[':cid']=$master;
		return self::model()->count($criteria);
	}
}
