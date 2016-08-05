<?php
/*
 * WysiHtml widget class file.
 */
class GMaps extends CWidget
{
	public $visible	= true;
	public $type = 'marker'; //basic, marker
	public $height = '300px';
	public $lat = '-7.774195';
	public $lng = '110.414535';
	public $baseUrl				= null;

	public function init()
	{
		if(!$this->visible) {
			return;
		}
		$this->publishAssets();
	}
	
    public function run()
    {
		if($this->visible) {
			$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
			$this->baseUrl = Yii::app()->getAssetManager()->publish($dir);
			
			//$this->render('_views');
		}
	}
	
	protected static function publishAssets()
	{
		$assets=dirname(__FILE__).'/assets';
		$baseUrl=Yii::app()->assetManager->publish($assets);
		if(is_dir($assets)){
			Yii::app()->clientScript->registerCoreScript('jquery');
			Yii::app()->clientScript->registerScriptFile('http://maps.google.com/maps/api/js?sensor=true',CClientScript::POS_END);
			Yii::app()->clientScript->registerScriptFile($baseUrl.'/gmaps.js',CClientScript::POS_END);
		} else {
			throw new Exception('EClEditor - Error: Couldn\'t find assets to publish.');
		}
	}
}
