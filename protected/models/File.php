<?php

/**
 * This is the model class for table "{{file}}".
 *
 * The followings are the available columns in table '{{file}}':
 * @property integer $id
 * @property string $file_name
 * @property string $file_ext
 * @property string $file_storage
 * @property integer $file_size
 * @property string $notes
 * @property string $date_entry
 * @property integer $user_entry
 * @property string $date_update
 * @property integer $user_update
 */
class File extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return File the static model class
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
		return '{{file}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_entry, user_entry', 'required'),
			array('file_size, user_entry, user_update', 'numerical', 'integerOnly'=>true),
			array('file_name', 'length', 'max'=>100),
			array('file_ext', 'length', 'max'=>128),
			array('file_storage', 'length', 'max'=>200),
			array('notes', 'length', 'max'=>255),
			array('date_update', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, file_name, file_ext, file_storage, file_size, notes, date_entry, user_entry, date_update, user_update', 'safe', 'on'=>'search'),
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
			'file_name' => 'File Name',
			'file_ext' => 'File Ext',
			'file_storage' => 'File Storage',
			'file_size' => 'File Size',
			'notes' => 'Notes',
			'date_entry' => 'Date Entry',
			'user_entry' => 'User Entry',
			'date_update' => 'Date Update',
			'user_update' => 'User Update',
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
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('file_ext',$this->file_ext,true);
		$criteria->compare('file_storage',$this->file_storage,true);
		$criteria->compare('file_size',$this->file_size);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('date_entry',$this->date_entry,true);
		$criteria->compare('user_entry',$this->user_entry);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('user_update',$this->user_update);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}