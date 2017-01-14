<?php

/**
 * This is the model class for table "{{mod_whatsapp}}".
 *
 * The followings are the available columns in table '{{mod_whatsapp}}':
 * @property integer $id
 * @property string $phone
 * @property string $message
 * @property integer $status
 * @property string $date_entry
 * @property string $date_update
 */
class ModWhatsapp extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{mod_whatsapp}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('phone, date_entry', 'required'),
            array('status', 'numerical', 'integerOnly' => true),
            array('phone', 'length', 'max' => 64),
            array('message, date_update', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, phone, message, status, date_entry, date_update', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'phone' => 'Phone',
            'address' => 'Address',
            'message' => 'Message',
            'status' => 'Status',
            'date_entry' => Yii::t('global', 'Date Entry'),
            'date_update' => Yii::t('global', 'Date Update'),
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('message', $this->message, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('date_entry', $this->date_entry, true);
        $criteria->compare('date_update', $this->date_update, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ModInquiry the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function counter($status = 0)
    {
        $criteria = new CDbCriteria;
        $criteria->compare('status', $status);

        return self::model()->count($criteria);
    }
}
