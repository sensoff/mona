<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property double $price
 * @property integer $count
 * @property integer $product_type_id
 * @property integer $category_id
 * @property integer $top
 * @property integer $order_id
 * @property integer $seo_id
 * @property string $image
 */
class Product extends CActiveRecord
{

	const COUNT_PER_PAGE=20;

	public $img;
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
				array('category_id, image', 'required'),
				array('product_type_id, photo_type, category_id, top', 'numerical', 'integerOnly'=>true),
				array('name_lang1, name_lang2, date_create, name_lang3, image', 'length', 'max'=>150),
				array('description, description_meta', 'length', 'max'=>5000),
				array('title', 'length', 'max'=>200),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, name, description, description_meta, title, product_type_id, category_id, top, image', 'safe', 'on'=>'search'),
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
				'name_lang1' => 'Цена:',
				'name_lang2' => 'Название фото <img style="width: 20px;" src="'.Yii::app()->getBaseUrl().'/images/language/uk.png'.'"> :',
				'name_lang3' => 'Название фото <img style="width: 20px;" src="'.Yii::app()->getBaseUrl().'/images/language/belarus.png'.'">',
				'description' => 'Описание товара:',
				'price' => 'Цена товара:',
				'sale' => 'Скиндка в %:',
				'count' => 'Count',
				'date_create'=>'Дата создания',
				'product_type_id' => 'Product Type',
				'category_id' => 'Category',
				'top' => 'Опубликовать:',
				'order_id' => 'Order',
				'avail'=>'Наличие',
				'url' => 'Alias товара:',
				'producer'=> 'Производитель:',
				'image' => 'Основное изображение:',
				'local'=> 'Local',
				'date_from'=> 'Date From',
				'date_to'=> 'Date To',
				'description_meta'=>'Описание meta',
				'keywoards'=>'Ключевые слова',
				'title'=>'Заголовок страницы',
				'slider'=>'Слайдер',
				'new'=>'Новинка',
				'photo_type'=>'Тип работы',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('count',$this->count);
		$criteria->compare('product_type_id',$this->product_type_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('top',$this->top);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('seo_id',$this->seo_id);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}


	static function getProducts($cid, $show=null){
		$criteria=new CDbCriteria();
		$criteria->addCondition('t.category_id= :cid');
		$criteria->params[':cid']=$cid;
		if(isset($cid) && $show!=null){
			$criteria->addCondition('t.top= :top');
			$criteria->params[':top']=$show;
		}
		return Product::model()->with('cat')->findAll($criteria);
	}

	static function getCounts($cid){
		//total
		$criteria=new CDbCriteria();
		$criteria->addCondition('t.category_id= :cid');
		$criteria->params[':cid']=$cid;
		$count['t']=Product::model()->count($criteria);
		//total publish
		$criteria=new CDbCriteria();
		$criteria->addCondition('t.category_id= :cid');
		$criteria->params[':cid']=$cid;
		$criteria->addCondition("top=1");
		$count['tp']=Product::model()->count($criteria);
		//total unpulish
		$criteria=new CDbCriteria();
		$criteria->addCondition('t.category_id= :cid');
		$criteria->params[':cid']=$cid;
		$criteria->addCondition("top=0");
		$count['tu']=Product::model()->count($criteria);
		//local publish
		return $count;
	}

	static public function getLeftMenu($categorys, $category, $counts){
		$leftArray=array();
		if($category!=null){
			$leftArray=array(array('name'=>$category->name_lang1.':', 'value'=>$counts['t'], 'link'=>CHtml::normalizeUrl(array('/catalog/category/view', 'id'=>$category->id))),
					array('name'=>'Опубликованные фото', 'value'=>$counts['tp'], 'link'=>CHtml::normalizeUrl(array('/catalog/category/view', 'id'=>$category->id, 'show'=>1))),
					array('name'=>'Неопубликованные фото', 'value'=>$counts['tu'], 'link'=>CHtml::normalizeUrl(array('/catalog/category/view', 'id'=>$category->id, 'show'=>0))),);
		}
		if(count($categorys)>0){
			foreach ($categorys as $item){
				$leftArray[]=array('name'=>$item->name_lang1, 'link'=>CHtml::normalizeUrl(array('/catalog/category/view', 'id'=>$item->id)));
			}
		}
		return $leftArray;
	}

	static public function getAvailList(){
		return array('1'=>'В наличии',
					'2'=>'Под заказ',
					'3'=>'Нет на складе',
		);
	}
}
