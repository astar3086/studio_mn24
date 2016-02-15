<?php

namespace Model;

use \Database\ActiveRecord\Record;

/**
 * This is the model class for table "user_payment".
 *
 * The followings are the available columns in table 'user_payment':
 * @property integer $iduser_payment
 * @property integer $iduser_credit
 * @property string $price
 * @property integer $date_pay
 *
 * The followings are the available model relations:
 * @property UserCredit $iduserCredit
 */
class UserPayment extends Record
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iduser_credit, date_pay', 'numerical', 'integerOnly'=>true),
			array('price', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iduser_payment, iduser_credit, price, date_pay', 'safe', 'on'=>'search'),
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
			'iduserCredit' => array(self::BELONGS_TO, 'UserCredit', 'iduser_credit'),
			'iduser0' => array(self::BELONGS_TO, 'User', 'iduser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iduser_payment' => 'Iduser Payment',
			'iduser_credit' => 'Iduser Credit',
			'price' => 'Price',
			'date_pay' => 'Date Pay',
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

		$criteria->compare('iduser_payment',$this->iduser_payment);
		$criteria->compare('iduser_credit',$this->iduser_credit);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('date_pay',$this->date_pay);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserPayment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
