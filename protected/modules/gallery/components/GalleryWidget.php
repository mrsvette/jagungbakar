<?php
Yii::import('zii.widgets.CPortlet');

class GalleryWidget extends CPortlet{

	public $visible = true;
	public $category;
	public $class_name = 'col-md-4 col-sm-6 col-xs-12 no-padding';
	public $use_thumb = true;
	public $pageSize = 6;
	public $pagination = true;
	public $show_pagination = false;
	public $url_query;
	public $type;
	
	public function init()
    {
        if($this->visible)
        {
 
        }
    }
 
    public function run()
    {
        if($this->visible)
        {
            $this->renderContent();
        }
    }
	
	protected function renderContent()
	{
		Yii::app()->clientscript->scriptMap['jquery.js'] = false;
		$criteria = new CDbCriteria;
		$criteria->order = 't.id DESC';
		if(isset($this->category)){
			$criteria->compare('category_rel.slug',$this->category);
			$criteria->with = array('category_rel');
		}

		$items = array();
		if(isset($this->url_query)){
			$pairs = explode('&',$this->url_query);
			foreach ($pairs as $pair) {
				$keyVal = explode('=',$pair);
				$key = &$keyVal[0];
				$val = urlencode($keyVal[1]);
				$items[$key] = $val;
			}
		}
		//var_dump($items);exit;
		$params = array(
				'criteria'=>$criteria,
				'pagination'=>array(
					'pageSize'=>$this->pageSize,
					'currentPage'=>($items['ModGallery_page']>0)? $items['ModGallery_page']-1 : null,
				)
			);
		
		if(!$this->pagination){
			$params = array(
				'criteria'=>$criteria,
				'pagination'=>false
			);
		}
		
		$dataProvider = new CActiveDataProvider('ModGallery', $params);
		
		$this->render(
			'_gallery',
			array(
				'dataProvider' => $dataProvider,
			)
		);
	}
}

?>
