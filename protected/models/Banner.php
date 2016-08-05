<?php

/**
 * This is the model class for table "{{banner}}".
 *
 * The followings are the available columns in table '{{banner}}':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $src
 * @property string $url
 * @property string $expired_date
 * @property string $date_entry
 * @property integer $user_entry
 * @property string $date_update
 * @property integer $user_update
 */
class Banner extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Banner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{banner}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, src, url, date_entry, user_entry', 'required'),
			array('src', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true),
			array('user_entry, user_update', 'numerical', 'integerOnly'=>true),
			array('name, key, src', 'length', 'max'=>128),
			array('url', 'length', 'max'=>255),
			array('description, expired_date, date_update', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, key, description, src, url, expired_date, date_entry, user_entry, date_update, user_update', 'safe', 'on'=>'search'),
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
			'name' => 'Nama Banner',
			'description' => 'Deskripsi',
			'src' => 'Gambar',
			'url' => 'Url',
			'expired_date' => 'Tanggal Kadaluarsa',
			'date_entry' => Yii::t('global','Date Entry'),
			'user_entry' => Yii::t('global','User Entry'),
			'date_update' => Yii::t('global','Date Update'),
			'user_update' => Yii::t('global','User Update'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('src',$this->src,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('expired_date',$this->expired_date,true);
		$criteria->compare('date_entry',$this->date_entry,true);
		$criteria->compare('user_entry',$this->user_entry);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('user_update',$this->user_update);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
