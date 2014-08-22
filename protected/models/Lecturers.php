<?php

/**
 * This is the model class for table "attorneys".
 *
 * The followings are the available columns in table 'attorneys':
 * @property integer $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $address
 * @property string $contact
 * @property string $expertise
 * @property string $id_no
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 * @property string $credentials
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $account_id
 *
 * The followings are the available model relations:
 * @property TblUsers $account
 * @property Videos[] $videoses
 */
class Lecturers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'attorneys';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_at, updated_at', 'required'),
			array('create_user_id, update_user_id, account_id', 'numerical', 'integerOnly'=>true),
			array('first_name, middle_name, last_name, address, contact, expertise, id_no, email', 'length', 'max'=>255),
			array('credentials', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, middle_name, last_name, address, contact, expertise, id_no, email, created_at, updated_at, credentials, create_user_id, update_user_id, account_id', 'safe', 'on'=>'search'),
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
			'videos' => array(self::HAS_MANY, 'Videos', 'attorneys_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'address' => 'Address',
			'contact' => 'Contact',
			'expertise' => 'Expertise',
			'id_no' => 'Id No',
			'email' => 'Email',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'credentials' => 'Credentials',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('expertise',$this->expertise,true);
		$criteria->compare('id_no',$this->id_no,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('credentials',$this->credentials,true);
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
	 * @return Lecturers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
