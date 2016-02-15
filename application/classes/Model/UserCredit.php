<?php

namespace Model;

use \Database\ActiveRecord\Record;

/**
 * This is the model class for table "user_credit".
 *
 * The followings are the available columns in table 'user_credit':
 * @property integer $iduser_credit
 * @property integer $data_begin
 * @property integer $period_days
 * @property string $price
 * @property string $price_remaining
 * @property integer $iduser
 * @property integer $idcredit_cards
 * @property integer $credit_close
 * @property integer $credit_formula
 *
 * The followings are the available model relations:
 * @property PaymentFormula $creditFormula
 * @property CreditCards $idcreditCards
 * @property User $iduser0
 * @property UserPayment[] $userPayments
 */
class UserCredit extends Record
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_credit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data_begin, period_days, iduser, idcredit_cards, credit_close, credit_formula', 'numerical', 'integerOnly'=>true),
			array('price, price_remaining', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iduser_credit, data_begin, period_days, price, price_remaining, iduser, idcredit_cards, credit_close, credit_formula', 'safe', 'on'=>'search'),
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
			'creditFormula' => array(self::BELONGS_TO, 'PaymentFormula', 'credit_formula'),
			'idcreditCards' => array(self::BELONGS_TO, 'CreditCards', 'idcredit_cards'),
			'iduser0' => array(self::BELONGS_TO, 'User', 'iduser'),
			'userPayments' => array(self::HAS_MANY, 'UserPayment', 'iduser_credit'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iduser_credit' => 'Iduser Credit',
			'data_begin' => 'Data Begin',
			'period_days' => 'Period Days',
			'price' => 'Price',
			'price_remaining' => 'Price Remaining',
			'iduser' => 'Iduser',
			'idcredit_cards' => 'Idcredit Cards',
			'credit_close' => 'Credit Close',
			'credit_formula' => 'Credit Formula',
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

		$criteria->compare('iduser_credit',$this->iduser_credit);
		$criteria->compare('data_begin',$this->data_begin);
		$criteria->compare('period_days',$this->period_days);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('price_remaining',$this->price_remaining,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('idcredit_cards',$this->idcredit_cards);
		$criteria->compare('credit_close',$this->credit_close);
		$criteria->compare('credit_formula',$this->credit_formula);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserCredit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
