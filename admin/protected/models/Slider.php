<?php

/**
 * This is the model class for table "slider".
 *
 * The followings are the available columns in table 'slider':
 * @property integer $id
 * @property string $file
 * @property string $url
 * @property integer $show
 * @property integer $position
 */
class Slider extends CActiveRecord
{

	public $img;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Slider the static model class
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
		return 'slider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('file, position', 'required'),
			array('show, position', 'numerical', 'integerOnly'=>true, 'message'=>'Должно быть число'),
			array('file', 'length', 'max'=>200),
			array('url, text_lang1, text_lang2, text_lang3', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, text_lang1, text_lang2, text_lang3, file, url, show, position', 'safe', 'on'=>'search'),
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
			'file' => 'Изображение',
			'url' => 'Цена',
			'show' => 'Отоброжать на сайте',
			'position' => 'Позиция',
			'text_lang1'=>'Текст на слайде',
				'text_lang2'=>'Текст на слайде',
				'text_lang3'=>'Текст на слайде',
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
		$criteria->compare('file',$this->file,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('show',$this->show);
		$criteria->compare('position',$this->position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	static function getSlides(){
		$criteria=new CDbCriteria();
		$criteria->order="position ASC";
		return self::model()->findAll($criteria);
	}
}
