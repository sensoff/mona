<?php

/**
 * This is the model class for table "blog".
 *
 * The followings are the available columns in table 'article':
 * @property integer $id
 * @property integer $name
 */
class Comments extends CActiveRecord
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
		return 'comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.

			array('id, user, comment, answer, date, rating, approve', 'safe', 'on'=>'search'),
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
			'user' => 'User',
			'comment' => 'Comment',
			'answer' => 'Ответ',
			'date' => 'Date',
			'rating' => 'Rating',
			'approve' => 'Опубликован'
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
		$criteria->compare('user',$this->user);
		$criteria->compare('comment',$this->comment);
		$criteria->compare('date',$this->date);
		$criteria->compare('answer',$this->answer);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('approve',$this->approve);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	static function getComments($show=null) {
		$criteria = new CDbCriteria();
		if ($show != null) {
			$criteria->addCondition('t.approve= :approve');
			$criteria->params[':approve'] = $show;
		}
		$criteria->order="date DESC";
		return self::model()->findAll($criteria);
	}

	static function getCounts() {
		$counts = array();
		//all
		$criteria = new CDbCriteria();
		$counts['all']=Comments::model()->count($criteria);
		//show
		$criteria = new CDbCriteria();
		$criteria->addCondition("t.approve = :approve");
		$criteria->params=array(':approve'=>1);
		$counts['show']=Comments::model()->count($criteria);
		//notshow
		$criteria=new CDbCriteria();
		$criteria->addCondition("t.approve = :approve");
		$criteria->params=array(':approve'=>0);
		$counts['nshow']=Comments::model()->count($criteria);
		return $counts;
	}

}
