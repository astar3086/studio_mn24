<?php

namespace Model;

use \Database\ActiveRecord\Record;

/**
 * This is the model class for table "user_cards".
 *
 * The followings are the available columns in table 'user_cards':
 * @property integer $iduser_cards
 * @property integer $iduser
 * @property integer $idcredit
 *
 * The followings are the available model relations:
 * @property CreditCards $idcredit0
 * @property User $iduser0
 */
class UserCards extends Record
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_cards';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iduser, idcredit', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iduser_cards, iduser, idcredit', 'safe', 'on'=>'search'),
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
			'idcredit0' => array(self::BELONGS_TO, 'CreditCards', 'idcredit'),
			'iduser0' => array(self::BELONGS_TO, 'User', 'iduser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iduser_cards' => 'Iduser Cards',
			'iduser' => 'Iduser',
			'idcredit' => 'Idcredit',
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

		$criteria->compare('iduser_cards',$this->iduser_cards);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('idcredit',$this->idcredit);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserCards the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
