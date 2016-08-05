<?php
Yii::import('zii.widgets.CPortlet');

class GalleryWidget extends CPortlet{
	public $visible=true;
	public $limit=6;
	public $htmloptions = array();
	public $pagination = false;
	
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
		$criteria=new CDbCriteria;
		$criteria->limit = $this->limit;
		$criteria->order='date_entry DESC';
		$dataProvider=new CActiveDataProvider('Gallery',array('criteria'=>$criteria,'pagination'=>$this->pagination));

		$this->render('_gallery',array('dataProvider'=>$dataProvider));
	}
}

?>
