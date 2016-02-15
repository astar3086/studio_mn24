<?php

namespace Model;

use \Database\ActiveRecord\Record;

/**
 * This is the model class for table "user_personal".
 *
 * The followings are the available columns in table 'user_personal':
 * @property integer $iduser_info
 * @property string $passport_serial
 * @property string $passport_number
 * @property integer $iduser
 *
 * The followings are the available model relations:
 * @property User $iduser0
 */
class UserPersonal extends Record
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_personal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iduser', 'numerical', 'integerOnly'=>true),
			array('passport_serial, passport_number', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iduser_info, passport_serial, passport_number, iduser', 'safe', 'on'=>'search'),
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
			'iduser0' => array(self::BELONGS_TO, 'User', 'iduser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iduser_info' => 'Iduser Info',
			'passport_serial' => 'Passport Serial',
			'passport_number' => 'Passport Number',
			'iduser' => 'Iduser',
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

		$criteria->compare('iduser_info',$this->iduser_info);
		$criteria->compare('passport_serial',$this->passport_serial,true);
		$criteria->compare('passport_number',$this->passport_number,true);
		$criteria->compare('iduser',$this->iduser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserPersonal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
