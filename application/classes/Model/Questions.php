<?php

namespace Model;

use \Database\ActiveRecord\Record;

/**
 * This is the model class for table "questions".
 *
 * The followings are the available columns in table 'questions':
 * @property integer $idquestions
 * @property integer $sender_id
 * @property integer $receiver_id
 * @property string $message
 * @property integer $sendtime
 * @property string $session
 * @property integer $read
 *
 * The followings are the available model relations:
 * @property User $receiver
 * @property User $sender
 */
class Questions extends Record
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sender_id, receiver_id, sendtime, read', 'numerical', 'integerOnly'=>true),
			array('session', 'length', 'max'=>45),
			array('message', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idquestions, sender_id, receiver_id, message, sendtime, session, read', 'safe', 'on'=>'search'),
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
			'receiver' => array(self::BELONGS_TO, 'User', 'receiver_id'),
			'sender' => array(self::BELONGS_TO, 'User', 'sender_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idquestions' => 'Idquestions',
			'sender_id' => 'Sender',
			'receiver_id' => 'Receiver',
			'message' => 'Message',
			'sendtime' => 'Sendtime',
			'session' => 'Session',
			'read' => 'Read',
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

		$criteria->compare('idquestions',$this->idquestions);
		$criteria->compare('sender_id',$this->sender_id);
		$criteria->compare('receiver_id',$this->receiver_id);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('sendtime',$this->sendtime);
		$criteria->compare('session',$this->session,true);
		$criteria->compare('read',$this->read);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Questions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
