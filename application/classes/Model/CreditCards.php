<?php

namespace Model;

use \Database\ActiveRecord\Record;

/**
 * This is the model class for table "credit_cards".
 *
 * The followings are the available columns in table 'credit_cards':
 * @property integer $idcredit_cards
 * @property string $card_type
 * @property integer $number
 * @property integer $CV2
 * @property string $Year
 * @property string $Month
 * @property integer $num_industry
 * @property integer $num_inn
 * @property integer $num_individual
 * @property integer $num_control
 *
 * The followings are the available model relations:
 * @property UserCards[] $userCards
 * @property UserCredit[] $userCredits
 */
class CreditCards extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'credit_cards';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('number, CV2, num_industry, num_inn, num_individual, num_control', 'numerical', 'integerOnly'=>true),
			array('card_type', 'length', 'max'=>45),
			array('Year', 'length', 'max'=>4),
			array('Month', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idcredit_cards, card_type, number, CV2, Year, Month, num_industry, num_inn, num_individual, num_control', 'safe', 'on'=>'search'),
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
			'userCards' => array(self::HAS_MANY, 'UserCards', 'idcredit'),
			'userCredits' => array(self::HAS_MANY, 'UserCredit', 'idcredit_cards'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcredit_cards' => 'Idcredit Cards',
			'card_type' => 'Card Type',
			'number' => 'Number',
			'CV2' => 'Cv2',
			'Year' => 'Year',
			'Month' => 'Month',
			'num_industry' => 'Num Industry',
			'num_inn' => 'Num Inn',
			'num_individual' => 'Num Individual',
			'num_control' => 'Num Control',
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

		$criteria->compare('idcredit_cards',$this->idcredit_cards);
		$criteria->compare('card_type',$this->card_type,true);
		$criteria->compare('number',$this->number);
		$criteria->compare('CV2',$this->CV2);
		$criteria->compare('Year',$this->Year,true);
		$criteria->compare('Month',$this->Month,true);
		$criteria->compare('num_industry',$this->num_industry);
		$criteria->compare('num_inn',$this->num_inn);
		$criteria->compare('num_individual',$this->num_individual);
		$criteria->compare('num_control',$this->num_control);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CreditCards the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
