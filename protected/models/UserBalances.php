<?php

/**
 * This is the model class for table "user_balances".
 *
 * The followings are the available columns in table 'user_balances':
 * @property integer $id
 * @property integer $account_id
 * @property double $balance
 * @property integer $user_id
 * @property string $expiration
 * @property string $created_at
 * @property string $updated_at
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $prepaid_id
 *
 * The followings are the available model relations:
 * @property TblUsers $account
 * @property Prepaids $prepaid
 * @property TblUsers $user
 */
class UserBalances extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_balances';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('account_id, created_at, updated_at', 'required'),
			array('account_id, user_id, create_user_id, update_user_id, prepaid_id', 'numerical', 'integerOnly'=>true),
			array('balance', 'numerical'),
			array('expiration', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, account_id, balance, user_id, expiration, created_at, updated_at, create_user_id, update_user_id, prepaid_id', 'safe', 'on'=>'search'),
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
			'account' => array(self::BELONGS_TO, 'TblUsers', 'account_id'),
			'prepaid' => array(self::BELONGS_TO, 'Prepaids', 'prepaid_id'),
			'user' => array(self::BELONGS_TO, 'TblUsers', 'user_id'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'shop_product_id' => 'Product Code',
			'balance' => 'Balance',
			'user_id' => 'User',
			'expiration' => 'Expiration',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'create_user_id' => 'Create User',
			'update_user_id' => 'Update User',
			'prepaid_id' => 'Prepaid',
			'is_subscription' => 'Subscription',
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
		$criteria->compare('shop_product_id',$this->shop_product_id);
		$criteria->compare('balance',$this->balance);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('expiration',$this->expiration,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_user_id',$this->update_user_id);
		$criteria->compare('prepaid_id',$this->prepaid_id);
		$criteria->compare('is_subscription', $this->is_subscription);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserBalances the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getUserBalance($id)
	{
     $balance = 0; // initialise assume none
     //....code here
     // Open user balanace table for data for the login user
     if($userBalanceRecord = UserBalances::model()->find(array('condition' => 'user_id=:id','params' => array(':id'=>$id))))
     {
         $balance = $userBalanceRecord->balance;
     } else {
         $balance =0;
     }
	 return $balance;	
	}

	public function isSubscriber($id) 

	{

		if($userStatus = UserBalances::model()->find(array('condition' => 'user_id=:id','params' => array(':id'=>$id))))
		{

			if($userStatus->is_subsription == 1)
			{

				return true;
			}
		else 
		   {

               return false;
		   }	
		}

    
	}
}
