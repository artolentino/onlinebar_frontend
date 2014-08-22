<?php

/**
 * This is the model class for table "user_balance_wrappers".
 *
 * The followings are the available columns in table 'user_balance_wrappers':
 * @property integer $id
 * @property integer $user_id
 * @property integer $user_balance_id
 * @property integer $subscription_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $account_id
 *
 * The followings are the available model relations:
 * @property UserBalanceWrappers $userBalance
 * @property UserBalanceWrappers[] $userBalanceWrappers
 * @property Subscriptions $subscription
 * @property TblUsers $account
 */
class UserBalanceWrappers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_balance_wrappers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_at, updated_at, account_id', 'required'),
			array('user_id, user_balance_id, subscription_id, create_user_id, update_user_id, account_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, user_balance_id, subscription_id, created_at, updated_at, create_user_id, update_user_id, account_id', 'safe', 'on'=>'search'),
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
			'userBalance' => array(self::BELONGS_TO, 'UserBalanceWrappers', 'user_balance_id'),
			'userBalanceWrappers' => array(self::HAS_MANY, 'UserBalanceWrappers', 'user_balance_id'),
			'subscription' => array(self::BELONGS_TO, 'Subscriptions', 'subscription_id'),
			'account' => array(self::BELONGS_TO, 'TblUsers', 'account_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'user_balance_id' => 'User Balance',
			'subscription_id' => 'Subscription',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'create_user_id' => 'Create User',
			'update_user_id' => 'Update User',
			'account_id' => 'Account',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_balance_id',$this->user_balance_id);
		$criteria->compare('subscription_id',$this->subscription_id);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_user_id',$this->update_user_id);
		$criteria->compare('account_id',$this->account_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserBalanceWrappers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
