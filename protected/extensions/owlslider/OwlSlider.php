<?php
/*
 * OwlSlider widget class file.
 * @author farid efendi <miftahfaridse@gmail.com>
 */
class OwlSlider extends CWidget
{
	public $visible				= true;
	public $htmlOptions			= array();
	public $imageList			= array();
	public $config				= array();
	public $baseUrl				= null;
	
	/* 
	 * Slide Options 
	 */
	public $playInterval		= 5000;
	public $pauseInterval		= 2500;
	public $generateNextPrev	= false;
	public $hoverPause			= true;

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
			
			/*Yii::app()->getClientScript()->registerScript(__CLASS__, "
				$(function(){
					$('.item:first').addClass('active');
				});
			");*/
			
			$this->render('_views');
		}
	}

	public function publishAssets()
	{
		$assets = dirname(__FILE__).'/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);
		if(is_dir($assets)){
			Yii::app()->clientScript->registerCoreScript('jquery');
			Yii::app()->clientScript->registerCssFile($baseUrl . '/owlcarousel.css');
			Yii::app()->clientScript->registerScriptFile($baseUrl . '/owlcarousel.js',CClientScript::POS_END);
			Yii::app()->clientScript->registerScriptFile($baseUrl . '/custom.js',CClientScript::POS_END);
		} else {
			throw new Exception('ResponsiveSlider - Error: Couldn\'t publish assets.');
		}
	}
}
