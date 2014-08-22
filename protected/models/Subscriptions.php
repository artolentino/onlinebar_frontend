<?php

/**
 * This is the model class for table "subscriptions".
 *
 * The followings are the available columns in table 'subscriptions':
 * @property integer $id
 * @property integer $package_id
 * @property string $subscription_no
 * @property string $name
 * @property string $street
 * @property string $region_code
 * @property string $province_code
 * @property string $municity_code
 * @property string $barangay_code
 * @property string $bgy
 * @property string $city
 * @property string $zip_code
 * @property string $contact
 * @property string $authorized_person
 * @property string $authorized_email
 * @property string $created_at
 * @property string $updated_at
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $reseller_id
 *
 * The followings are the available model relations:
 * @property TblRegion $regionCode
 * @property TblProvinces $provinceCode
 * @property TblmuniCity $municityCode
 * @property Packages $package
 * @property TblBarangay $barangayCode
 * @property TblResellers $reseller
 * @property UserBalanceWrappers[] $userBalanceWrappers
 */
class Subscriptions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'subscriptions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('region_code, province_code, municity_code, barangay_code, created_at, updated_at', 'required'),
			array('package_id, create_user_id, update_user_id, reseller_id', 'numerical', 'integerOnly'=>true),
			array('subscription_no, name, street, bgy, city, zip_code, contact, authorized_person, authorized_email', 'length', 'max'=>255),
			array('region_code, province_code, municity_code, barangay_code', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, package_id, subscription_no, name, street, region_code, province_code, municity_code, barangay_code, bgy, city, zip_code, contact, authorized_person, authorized_email, created_at, updated_at, create_user_id, update_user_id, reseller_id', 'safe', 'on'=>'search'),
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
			'regionCode' => array(self::BELONGS_TO, 'TblRegion', 'region_code'),
			'provinceCode' => array(self::BELONGS_TO, 'TblProvinces', 'province_code'),
			'municityCode' => array(self::BELONGS_TO, 'TblmuniCity', 'municity_code'),
			'package' => array(self::BELONGS_TO, 'Packages', 'package_id'),
			'barangayCode' => array(self::BELONGS_TO, 'TblBarangay', 'barangay_code'),
			'reseller' => array(self::BELONGS_TO, 'TblResellers', 'reseller_id'),
			'userBalanceWrappers' => array(self::HAS_MANY, 'UserBalanceWrappers', 'subscription_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'package_id' => 'Package',
			'subscription_no' => 'Subscription No',
			'name' => 'Name',
			'street' => 'Street',
			'region_code' => 'Region Code',
			'province_code' => 'Province Code',
			'municity_code' => 'Municity Code',
			'barangay_code' => 'Barangay Code',
			'bgy' => 'Bgy',
			'city' => 'City',
			'zip_code' => 'Zip Code',
			'contact' => 'Contact',
			'authorized_person' => 'Authorized Person',
			'authorized_email' => 'Authorized Email',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'create_user_id' => 'Create User',
			'update_user_id' => 'Update User',
			'reseller_id' => 'Reseller',
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
		$criteria->compare('package_id',$this->package_id);
		$criteria->compare('subscription_no',$this->subscription_no,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('region_code',$this->region_code,true);
		$criteria->compare('province_code',$this->province_code,true);
		$criteria->compare('municity_code',$this->municity_code,true);
		$criteria->compare('barangay_code',$this->barangay_code,true);
		$criteria->compare('bgy',$this->bgy,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip_code',$this->zip_code,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('authorized_person',$this->authorized_person,true);
		$criteria->compare('authorized_email',$this->authorized_email,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_user_id',$this->update_user_id);
		$criteria->compare('reseller_id',$this->reseller_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Subscriptions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
