<?php

namespace Model;

use \Database\ActiveRecord\Record;

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $idpages
 * @property string $title
 * @property string $description
 * @property string $main_text
 * @property string $alias
 * @property integer $idpage_type
 *
 * The followings are the available model relations:
 * @property PageType $idpageType
 */
class Pages extends Record
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idpage_type', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('alias', 'length', 'max'=>100),
			array('description, main_text', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idpages, title, description, main_text, alias, idpage_type', 'safe', 'on'=>'search'),
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
			'idpageType' => array(self::BELONGS_TO, 'PageType', 'idpage_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpages' => 'Idpages',
			'title' => 'Title',
			'description' => 'Description',
			'main_text' => 'Main Text',
			'alias' => 'Alias',
			'idpage_type' => 'Idpage Type',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idpages',$this->idpages);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('main_text',$this->main_text,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('idpage_type',$this->idpage_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @param string $className
	 * @return Item
	 */
	/*public static function model($className=__CLASS__)
	{
		return new $className();
	}*/
}
