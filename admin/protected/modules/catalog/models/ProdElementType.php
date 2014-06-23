<?php

/**
 * This is the model class for table "prod_element_type".
 *
 * The followings are the available columns in table 'prod_element_type':
 * @property integer $id
 * @property integer $product_type_id
 * @property string $ed_izmerenia
 * @property string $lable
 * @property string $input_type
 * @property string $input_values
 * @property string $description
 */
class ProdElementType extends CActiveRecord
{
	public $value;
	public $valueid;
	public $values;
	public $selectedid;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProdElementType the static model class
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
		return 'prod_element_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_type_id, lable, input_type', 'required'),
			array('product_type_id', 'numerical', 'integerOnly'=>true),
			array('ed_izmerenia', 'length', 'max'=>30),
			array('lable', 'length', 'max'=>120),
			array('input_type', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_type_id, ed_izmerenia, lable, input_type, input_values, description', 'safe', 'on'=>'search'),
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
				'valuess'=>array(self::HAS_ONE, 'ProdElement', 'prod_element_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'product_type_id' => 'Product Type',
			'ed_izmerenia' => 'еденица измерения',
			'lable' => 'название',
			'input_type' => 'тип ввода',
			'description' => 'описание',
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
		$criteria->compare('product_type_id',$this->product_type_id);
		$criteria->compare('ed_izmerenia',$this->ed_izmerenia,true);
		$criteria->compare('lable',$this->lable,true);
		$criteria->compare('input_type',$this->input_type,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	//static function getProdElemTypes($prodtype){
	//	$criteria=new CDbCriteria();
	//	if($prodtype!=0){
	//		$criteria->addCondition("product_type_id=:prodtypeid");
	//		$criteria->params = array(':prodtypeid' => $prodtype);
	//	}
	//	return self::model()->findAll($criteria);
	//}
	
	static function getProdElemTypes($prodtype){
		$criteria=new CDbCriteria();
		if($prodtype!=0){
			$criteria->addCondition("product_type_id=:prodtypeid");
			$criteria->params = array(':prodtypeid' => $prodtype);
		}
		$elems=self::model()->findAll($criteria);
		$res=array();
		for($i=0;$i<count($elems);$i++){
			if($elems[$i]->input_type=='Select'){
				$res[]=$elems[$i]->id;
			}
		}
		if(count($res)>0){
			$criteria=new CDbCriteria();
			for ($i=0;$i<count($res);$i++){
				$criteria->addCondition("type_id=".$res[$i], 'OR');
			}
			$values=ProdElementTypeValues::model()->findAll($criteria);
			for($i=0;$i<count($elems);$i++){
				if($elems[$i]->input_type=='Select'){
					$elems[$i]->values[0]='None';
					for($z=0;$z<count($values);$z++){
						if($values[$z]['type_id']==$elems[$i]->id){
							$elems[$i]->values[$values[$z]['id']]=$values[$z]['value'];
						}
					}
				}
			}
		}
		return $elems;
	}
}