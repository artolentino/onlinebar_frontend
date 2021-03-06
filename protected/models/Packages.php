<?php

/**
 * This is the model class for table "packages".
 *
 * The followings are the available columns in table 'packages':
 * @property integer $id
 * @property string $package_name
 * @property double $amount
 * @property double $duration
 * @property integer $users
 * @property string $created_at
 * @property string $updated_at
 * @property integer $is_subscription
 * @property integer $update_user_id
 * @property integer $create_user_id
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Prepaids[] $prepaids
 * @property Subscriptions[] $subscriptions
 */
class Packages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'packages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_at, updated_at, description', 'required'),
			array('users, is_subscription, update_user_id, create_user_id', 'numerical', 'integerOnly'=>true),
			array('amount, duration', 'numerical'),
			array('package_name, description', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, package_name, amount, duration, users, created_at, updated_at, is_subscription, update_user_id, create_user_id, description', 'safe', 'on'=>'search'),
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
			'prepaids' => array(self::HAS_MANY, 'Prepaids', 'package_id'),
			'subscriptions' => array(self::HAS_MANY, 'Subscriptions', 'package_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'package_name' => 'Package Name',
			'amount' => 'Amount',
			'duration' => 'Duration',
			'users' => 'Users',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'is_subscription' => 'Is Subscription',
			'update_user_id' => 'Update User',
			'create_user_id' => 'Create User',
			'description' => 'Description',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('package_name',$this->package_name,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('users',$this->users);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('is_subscription',$this->is_subscription);
		$criteria->compare('update_user_id',$this->update_user_id);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Packages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
