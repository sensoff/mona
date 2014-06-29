<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'blog':
 * @property integer $id
 * @property string $name
 * @property integer $blog_id
 * @property string $pre_text
 * @property string $main_text
 * @property string $create_date
 * @property integer $show
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Blog the static model class
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
			array('main_text_lang1', 'required'),
			array('blog_id, show', 'numerical', 'integerOnly'=>true),
			array('name_lang1, name_lang2, name_lang3', 'length', 'max'=>50),
			array('description_meta_lang1, description_meta_lang2, description_meta_lang3, main_text_lang2, main_text_lang3, keywoards, title_lang1, title_lang2, title_lang3, alias', 'length', 'max'=>5000),
			array('alias', 'unique', 'message'=>'Запись с таким именем уже существует.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name_lang1, name_lang2, name_lang3, blog_id, pre_text, main_text_lang1, main_text_lang2, main_text_lang3, create_date, show, description_meta, keywoards, title, alias', 'safe', 'on'=>'search'),
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
			'name_lang1' => 'Заголовок страницы',
				'name_lang2' => 'Заголовок страницы',
				'name_lang3' => 'Заголовок страницы',
			'blog_id' => 'Blog',
			'pre_text' => 'Пре-текст',
			'main_text_lang1' => 'Текст нововсти',
				'main_text_lang2' => 'Текст страницы',
				'main_text_lang3' => 'Текст страницы',
			'create_date' => 'Create Date',
			'show' => 'Опубликовать',
				'description_meta_lang1'=>'Описание meta',
				'description_meta_lang2'=>'Описание meta',
				'description_meta_lang3'=>'Описание meta',
				'keywoards'=>'Ключевые слова',
				'title_lang1'=>'Заголовок страницы',
				'title_lang2'=>'Заголовок страницы',
				'title_lang3'=>'Заголовок страницы',
				'alias' => 'Alias товара:',
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
		$criteria->compare('blog_id',$this->blog_id);
		$criteria->compare('pre_text',$this->pre_text,true);
		$criteria->compare('main_text',$this->main_text,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('show',$this->show);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	static function getArticles($blogid=0, $show=null){
		$criteria=new CDbCriteria();
		$criteria->addCondition('blog_id = :bid');
		$criteria->params=array(':bid'=>$blogid);
		if(isset($show)){
			$criteria->addCondition('t.show = :show');
			$criteria->params[':show']=$show;
		}
		$articles=self::model()->findAll($criteria);
		return $articles;
	}

	static function getCounts(){
		//все
		$criteria=new CDbCriteria();
		$criteria->addCondition('t.blog_id=1');
		$counts['all']=Article::model()->count($criteria);
		//опубликованные
		$criteria->addCondition('t.show = 1');
		$counts['show']=Article::model()->count($criteria);
		//неопубликованные
		$criteria=new CDbCriteria();
		$criteria->addCondition('t.blog_id=1');
		$criteria->addCondition('t.show = 0');
		$counts['nshow']=Article::model()->count($criteria);
		return $counts;
	}

	static function getAboutCounts(){
		//about
		$criteria=new CDbCriteria();
		$criteria->addCondition('t.blog_id = 2');
		$counts['about']=Article::model()->count($criteria);
		//learn
		$criteria=new CDbCriteria();
		$criteria->addCondition('t.blog_id = 3');
		$counts['learn']=Article::model()->count($criteria);
		return $counts;
	}
}
