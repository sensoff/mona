<?php

/**
 * This is the model class for table "days".
 *
 * The followings are the available columns in table 'days':
 * @property string $one_day_start
 * @property string $one_day_end
 * @property integer $one_day_doff
 * @property string $thow_day_start
 * @property string $thow_day_end
 * @property integer $thow_day_doff
 * @property string $three_day_start
 * @property string $three_day_end
 * @property integer $three_day_doff
 * @property string $four_day_start
 * @property string $four_day_end
 * @property integer $four_day_doff
 * @property string $five_day_start
 * @property string $five_day_end
 * @property integer $five_day_doff
 * @property string $six_day_start
 * @property string $six_day_end
 * @property integer $six_day_doff
 * @property string $seven_day_start
 * @property string $seven_day_end
 * @property integer $seven_day_doff
 * @property integer $id
 */
class Days extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Days the static model class
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
		return 'days';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('one_day_start, one_day_end, one_day_doff, thow_day_start, thow_day_end, thow_day_doff, three_day_start, three_day_end, three_day_doff, four_day_start, four_day_end, four_day_doff, five_day_start, five_day_end, five_day_doff, six_day_start, six_day_end, six_day_doff, seven_day_start, seven_day_end, seven_day_doff, id', 'required'),
			array('one_day_doff, thow_day_doff, three_day_doff, four_day_doff, five_day_doff, six_day_doff, seven_day_doff, id', 'numerical', 'integerOnly'=>true),
			array('one_day_start, one_day_end, thow_day_start, thow_day_end, three_day_start, three_day_end, four_day_start, four_day_end, five_day_start, five_day_end, six_day_start, six_day_end, seven_day_start, seven_day_end', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('one_day_start, one_day_end, one_day_doff, thow_day_start, thow_day_end, thow_day_doff, three_day_start, three_day_end, three_day_doff, four_day_start, four_day_end, four_day_doff, five_day_start, five_day_end, five_day_doff, six_day_start, six_day_end, six_day_doff, seven_day_start, seven_day_end, seven_day_doff, id', 'safe', 'on'=>'search'),
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
			'one_day_start' => 'One Day Start',
			'one_day_end' => 'One Day End',
			'one_day_doff' => 'One Day Doff',
			'thow_day_start' => 'Thow Day Start',
			'thow_day_end' => 'Thow Day End',
			'thow_day_doff' => 'Thow Day Doff',
			'three_day_start' => 'Three Day Start',
			'three_day_end' => 'Three Day End',
			'three_day_doff' => 'Three Day Doff',
			'four_day_start' => 'Four Day Start',
			'four_day_end' => 'Four Day End',
			'four_day_doff' => 'Four Day Doff',
			'five_day_start' => 'Five Day Start',
			'five_day_end' => 'Five Day End',
			'five_day_doff' => 'Five Day Doff',
			'six_day_start' => 'Six Day Start',
			'six_day_end' => 'Six Day End',
			'six_day_doff' => 'Six Day Doff',
			'seven_day_start' => 'Seven Day Start',
			'seven_day_end' => 'Seven Day End',
			'seven_day_doff' => 'Seven Day Doff',
			'id' => 'ID',
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

		$criteria->compare('one_day_start',$this->one_day_start,true);
		$criteria->compare('one_day_end',$this->one_day_end,true);
		$criteria->compare('one_day_doff',$this->one_day_doff);
		$criteria->compare('thow_day_start',$this->thow_day_start,true);
		$criteria->compare('thow_day_end',$this->thow_day_end,true);
		$criteria->compare('thow_day_doff',$this->thow_day_doff);
		$criteria->compare('three_day_start',$this->three_day_start,true);
		$criteria->compare('three_day_end',$this->three_day_end,true);
		$criteria->compare('three_day_doff',$this->three_day_doff);
		$criteria->compare('four_day_start',$this->four_day_start,true);
		$criteria->compare('four_day_end',$this->four_day_end,true);
		$criteria->compare('four_day_doff',$this->four_day_doff);
		$criteria->compare('five_day_start',$this->five_day_start,true);
		$criteria->compare('five_day_end',$this->five_day_end,true);
		$criteria->compare('five_day_doff',$this->five_day_doff);
		$criteria->compare('six_day_start',$this->six_day_start,true);
		$criteria->compare('six_day_end',$this->six_day_end,true);
		$criteria->compare('six_day_doff',$this->six_day_doff);
		$criteria->compare('seven_day_start',$this->seven_day_start,true);
		$criteria->compare('seven_day_end',$this->seven_day_end,true);
		$criteria->compare('seven_day_doff',$this->seven_day_doff);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}