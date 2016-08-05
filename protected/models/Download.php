<?php

/**
 * This is the model class for table "{{download}}".
 *
 * The followings are the available columns in table '{{download}}':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $company
 * @property string $note
 * @property integer $catalogue_id
 * @property integer $approved
 * @property integer $status
 * @property string $date_entry
 */
class Download extends CActiveRecord
{
	public $catalogue;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{download}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, phone, catalogue_id, date_entry', 'required'),
			array('catalogue_id, approved, status', 'numerical', 'integerOnly'=>true),
			array('name, email', 'length', 'max'=>64),
			array('phone', 'length', 'max'=>15),
			array('company', 'length', 'max'=>128),
			array('address, note, catalogue', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, email, phone, address, company, note, catalogue_id, approved, status, date_entry, catalogue', 'safe', 'on'=>'search'),
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
			'catalogue_rel'=>array(self::BELONGS_TO,'Catalogue','catalogue_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'email' => 'Email',
			'phone' => 'Phone',
			'address' => 'Address',
			'company' => 'Company',
			'note' => 'Note',
			'catalogue_id' => 'Catalogue',
			'approved' => 'Approved',
			'status' => 'Status',
			'date_entry' => 'Date Entry',
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.email',$this->email,true);
		$criteria->compare('t.phone',$this->phone,true);
		$criteria->compare('t.address',$this->address,true);
		$criteria->compare('t.company',$this->company,true);
		$criteria->compare('t.note',$this->note,true);
		$criteria->compare('t.catalogue_id',$this->catalogue_id);
		$criteria->compare('catalogue_rel.catalogue',$this->catalogue);
		$criteria->compare('t.approved',$this->approved);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.date_entry',$this->date_entry,true);
		$criteria->order='t.date_entry DESC';
		$criteria->with=array('catalogue_rel');
		$criteria->together=true;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Download the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
