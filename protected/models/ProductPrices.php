<?php

/**
 * This is the model class for table "{{product_prices}}".
 *
 * The followings are the available columns in table '{{product_prices}}':
 * @property integer $id
 * @property integer $product_item_id
 * @property string $name
 * @property string $period
 * @property double $price
 */
class ProductPrices extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{product_prices}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_item_id, name, period, price', 'required'),
			array('product_item_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('name, period', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, product_item_id, name, period, price', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'product_item_id' => 'Product Item',
			'name' => 'Name',
			'period' => 'Period',
			'price' => 'Price',
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
		$criteria->compare('product_item_id',$this->product_item_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('period',$this->period,true);
		$criteria->compare('price',$this->price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductPrices the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function alreadySaved()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('product_item_id',$this->product_item_id);
		$criteria->compare('LOWER(name)',strtolower($this->name));
		//$criteria->compare('period',$this->period);
		//$criteria->compare('price',$this->price);
		return (self::model()->count($criteria)>0)? true : false;
	}
}
