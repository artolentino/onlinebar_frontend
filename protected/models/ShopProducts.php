<?php

/**
 * This is the model class for table "shop_products".
 *
 * The followings are the available columns in table 'shop_products':
 * @property integer $product_id
 * @property integer $category_id
 * @property integer $status
 * @property integer $tax_id
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $price
 * @property string $language
 * @property string $specifications
 * @property integer $duration
 * @property integer $users
 *
 * The followings are the available model relations:
 * @property ShopImage[] $shopImages
 * @property ShopCategory $category
 */
class ShopProducts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'shop_products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, status, tax_id, title', 'required'),
			array('category_id, status, tax_id, duration, users', 'numerical', 'integerOnly'=>true),
			array('title, price, language', 'length', 'max'=>45),
			array('keywords', 'length', 'max'=>255),
			array('description, specifications', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('product_id, category_id, status, tax_id, title, description, keywords, price, language, specifications, duration, users', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'ShopCategory', 'category_id'),
			'images' => array(self::HAS_MANY, 'Image', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'product_id' => 'Product',
			'category_id' => 'Category',
			'status' => 'Status',
			'tax_id' => 'Tax',
			'title' => 'Title',
			'description' => 'Description',
			'keywords' => 'Keywords',
			'price' => 'Price',
			'language' => 'Language',
			'specifications' => 'Specifications',
			'duration' => 'Duration',
			'users' => 'Users',
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

		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('tax_id',$this->tax_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('specifications',$this->specifications,true);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('users',$this->users);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ShopProducts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
