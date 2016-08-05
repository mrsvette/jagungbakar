<?php

/**
 * This is the model class for table "{{nivo_slider}}".
 *
 * The followings are the available columns in table '{{nivo_slider}}':
 * @property integer $id
 * @property string $image
 * @property string $caption
 * @property string $url
 * @property integer $order
 */
class NivoSlider extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NivoSlider the static model class
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
		return '{{nivo_slider}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image','required','on'=>'create'),
			array('image', 'file','types'=>'jpg, png, gif','allowEmpty'=>true,'on'=>'create'),
			array('caption', 'safe'),
			array('order', 'required'),
			array('title, dateentry, url','safe'),
			array('order', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, image, caption, url, order', 'safe', 'on'=>'search'),
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
			'image' => 'Image',
			'caption' => 'Caption',
			'url' => 'Url',
			'order' => 'Order',
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
		$criteria->compare('image',$this->image,true);
		$criteria->compare('caption',$this->caption,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('order',$this->order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function items()
	{
		$criteria=new CDbCriteria;
		$criteria->order='t.order ASC';
		$models=self::model()->findAll($criteria);
		$list=array();
		foreach($models as $model){
			$list[]=array(
					'src'=>'images/slider/'.$model->image,
					'caption'=>$model->caption,
					'url'=>array($model->url),
				);
		}
		return $list;
	}

	public function coinSlider()
	{
		$criteria=new CDbCriteria;
		$criteria->order='t.order ASC';
		$models=self::model()->findAll($criteria);
		$list=array();
		foreach($models as $model){
			$items[]=array(
					'image'=>Yii::app()->request->baseUrl.'/images/slider/'.$model->image,
					'url'=>array($model->url),
					'info' => array(
						'text' => $model->caption
					    )
				);
		}
		return $items;
	}

	public function lofSlider()
	{
		$criteria=new CDbCriteria;
		$criteria->order='t.order ASC';
		$models=self::model()->findAll($criteria);
		$list=array();
		foreach($models as $model){
			$items[]=array(
					'image_url'=>'/images/slider/'.$model->image,
					'image_file'=>$model->image,
					'link'=>null,
				);
		}
		return $items;
	}

	public function flexSlider()
	{
		$criteria=new CDbCriteria;
		$criteria->order='t.order ASC';
		$models=self::model()->findAll($criteria);
		$list=array();
		foreach($models as $model){
			$items[]=array(
					'title'=>$model->title,
					'image_url'=>'images/slider/'.$model->image,
					'image_file'=>$model->image,
					'date_entry'=>$model->dateentry,
					'caption'=>$model->caption,
				);
		}
		return $items;
	}	

	public function responsiveSilder()
	{
		$criteria=new CDbCriteria;
		$criteria->order='t.order ASC';
		$models=self::model()->findAll($criteria);
		$list=array();
		foreach($models as $model){
			$list[]=array(
					'src'=>'images/slider/'.$model->image,
					'caption'=>$model->caption,
					'url'=>array($model->url),
				);
		}
		return $list;
	}
}
