<?php

namespace Model;

use \Database\ActiveRecord\Record;

/**
 * This is the model class for table "payment_formula".
 *
 * The followings are the available columns in table 'payment_formula':
 * @property integer $idpayment_formula
 * @property integer $day1_procent
 * @property integer $loan1_procent
 * @property integer $loan2_procent
 * @property integer $loan3_procent
 * @property integer $loan4_procent
 * @property integer $loan5_procent
 * @property integer $loan6_procent
 * @property integer $loan7_procent
 *
 * The followings are the available model relations:
 * @property UserCredit[] $userCredits
 */
class PaymentFormula extends Record
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payment_formula';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('day1_procent, loan1_procent, loan2_procent, loan3_procent, loan4_procent, loan5_procent, loan6_procent, loan7_procent', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idpayment_formula, day1_procent, loan1_procent, loan2_procent, loan3_procent, loan4_procent, loan5_procent, loan6_procent, loan7_procent', 'safe', 'on'=>'search'),
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
			'userCredits' => array(self::HAS_MANY, 'UserCredit', 'credit_formula'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpayment_formula' => 'Idpayment Formula',
			'day1_procent' => 'Day1 Procent',
			'loan1_procent' => 'Loan1 Procent',
			'loan2_procent' => 'Loan2 Procent',
			'loan3_procent' => 'Loan3 Procent',
			'loan4_procent' => 'Loan4 Procent',
			'loan5_procent' => 'Loan5 Procent',
			'loan6_procent' => 'Loan6 Procent',
			'loan7_procent' => 'Loan7 Procent',
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

		$criteria->compare('idpayment_formula',$this->idpayment_formula);
		$criteria->compare('day1_procent',$this->day1_procent);
		$criteria->compare('loan1_procent',$this->loan1_procent);
		$criteria->compare('loan2_procent',$this->loan2_procent);
		$criteria->compare('loan3_procent',$this->loan3_procent);
		$criteria->compare('loan4_procent',$this->loan4_procent);
		$criteria->compare('loan5_procent',$this->loan5_procent);
		$criteria->compare('loan6_procent',$this->loan6_procent);
		$criteria->compare('loan7_procent',$this->loan7_procent);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PaymentFormula the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
