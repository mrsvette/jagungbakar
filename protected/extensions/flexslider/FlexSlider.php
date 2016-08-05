<?php
/*
 * FlexSlider widget class file.
 * @author farid efendi <miftahfaridse@gmail.com>
 */
class FlexSlider extends CWidget
{
	public $visible				= true;
	public $htmlOptions			= array();
	public $imageList			= array();
	public $config				= array();
	public $baseUrl				= null;
	
	/* 
	 * Slide Options 
	 */
	public $slideshowSpeed		= 5000;
	public $animationSpeed		= 1000;
	public $controlNav			= false;

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
			
			$this->render('_views');
		}
	}

	public function publishAssets()
	{
		$assets = dirname(__FILE__).'/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);
		if(is_dir($assets)){
			Yii::app()->clientScript->registerCoreScript('jquery');
			Yii::app()->clientScript->registerCssFile($baseUrl . '/flexslider.css');
			Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.flexslider.js',CClientScript::POS_END);
		} else {
			throw new Exception('ResponsiveSlider - Error: Couldn\'t publish assets.');
		}
	}
}
