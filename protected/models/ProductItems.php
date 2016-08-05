<?php

/**
 * This is the model class for table "{{product_items}}".
 *
 * The followings are the available columns in table '{{product_items}}':
 * @property integer $id
 * @property integer $product_id
 * @property string $name
 * @property string $description
 * @property string $date_entry
 * @property integer $user_entry
 * @property string $date_update
 * @property integer $user_update
 */
class ProductItems extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{product_items}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, name, date_entry, user_entry', 'required'),
			array('product_id, parent_id, level, user_entry, user_update', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('description, date_update', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, product_id, name, description, date_entry, user_entry, date_update, user_update', 'safe', 'on'=>'search'),
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
			'product_rel'=>array(self::BELONGS_TO,'Product','product_id'),
			'price_rel'=>array(self::HAS_MANY,'ProductPrices','product_item_id'),
			'price_count'=>array(self::STAT,'ProductPrices','product_item_id'),
			'facility_rel'=>array(self::HAS_MANY,'ProductFasilities','product_item_id'),
			'available_rel'=>array(self::HAS_MANY,'ProductAvailability','product_item_id'),
			'image_rel'=>array(self::HAS_MANY,'ProductImages','product_item_id'),
			'image_count'=>array(self::STAT,'ProductImages','product_item_id'),
			'image_one_rel'=>array(self::HAS_ONE,'ProductImages','product_item_id'),
			'parent_rel'=>array(self::BELONGS_TO,'ProductItems','parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'product_id' => 'Product',
			'name' => 'Name',
			'description' => 'Description',
			'date_entry' => 'Date Entry',
			'user_entry' => 'User Entry',
			'date_update' => 'Date Update',
			'user_update' => 'User Update',
			'parent_id' => 'Parent',
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
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date_entry',$this->date_entry,true);
		$criteria->compare('user_entry',$this->user_entry);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('user_update',$this->user_update);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductItems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the URL that shows the detail of the post
	 */
	public function getUrl()
	{
		return Yii::app()->createUrl('product/view', array(
				'id'=>$this->id,
				'title'=>$this->title,
			));
	}

	public function getParseContent($char=20,$include_readmore=false)
	{
		$p = new CHtmlPurifier();
		$pecah=explode(" ",strip_tags($p->purify($this->description)));
		if(count($pecah)<=$char){
			if($include_readmore)
				array_push($pecah, '. . . '.CHtml::link('Read more',$this->url));
			$news=implode(" ",$pecah);
		}else{
			$new_arr=array_slice($pecah, 0, $char); 
			if($include_readmore)  
				$new_arr[$char]='. . . '.CHtml::link('Read more',$this->url);
			else
				$new_arr[$char]='. . .';
			$news=implode(" ",$new_arr);
		}
		return $news;
	}

	public function items($product_id,$limit=100,$title=null,$level=0)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('product_id',$product_id);
		$criteria->compare('level',$level);
		$criteria->limit=$limit;
		$models=self::model()->findAll($criteria);
		$items=array();
		if(!empty($title))
			$items['']=$title;
		foreach($models as $model){
			$items[$model->id]=$model->name;
		}
		return $items;
	}

	public function getDataProvider($product_id,$limit=100)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('product_id',$product_id);
		$criteria->limit=$limit;

		$dataProvider=new CActiveDataProvider('ProductItems',array('criteria'=>$criteria));
		
		return $dataProvider;
	}

	public function getDataProviderByType($product_type,$limit=10,$level=0)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('product_rel.type',$product_type);
		$criteria->compare('level',$level);
		$criteria->with=array('product_rel');
		$criteria->limit=$limit;
		
		$dataProvider=new CActiveDataProvider('ProductItems',array('criteria'=>$criteria,'pagination'=>false));
		
		return $dataProvider;
	}

	public function carousel()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('product_rel.type',3);
		$criteria->with=array('product_rel');
		$models=self::model()->findAll($criteria);
		$items=array();
		foreach($models as $model){
			$items[$model->id]=array(
					'thumb_url'=>ProductImages::getImageByType($model->id,2)->thumb,
					'image_thumb'=>ProductImages::getImageByType($model->id,2)->image,
					//'link'=>Yii::app()->request->baseUrl.'/'.$model->image_one_rel->src.$model->image_one_rel->image,
					'link'=>'#',	
				);
		}
		return $items;
	}

	public function hasChild($product_id)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id',$product_id);
		//$criteria->compare('level','>1');
		$count=self::model()->count($criteria);
		return ($count>0)? true : false;
	}
}
