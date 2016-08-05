<?php
/*
 * CarouselSlider widget class file.
 * @author farid efendi <farid_efendi@dhefend.com>
 */
class CarouselSlider extends CWidget
{
	public $visible				= true;
	public $htmlOptions			= array();
	public $imageList			= array();
	public $config				= array();
	public $baseUrl				= null;
	public $eachNumber			= 5;
	
	/* 
	 * Slide Options 
	 */
	public $playInterval		= 8000;
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
			
			Yii::app()->getClientScript()->registerScript(__CLASS__, "
				$(function(){
					$('#slides').slides({
						preload: true,
						generateNextPrev: '".$this->generateNextPrev."',	
						play: ".$this->playInterval.",
						pause: ".$this->pauseInterval.",
						hoverPause: '".$this->hoverPause."',		
					});
				});
			");
			
			$this->render('_views');
		}
	}
	
	public function publishAssets()
	{
		$assets = dirname(__FILE__).'/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);
		if(is_dir($assets)){
			Yii::app()->clientScript->registerCoreScript('jquery');
			Yii::app()->clientScript->registerCssFile($baseUrl . '/carousel-style.css');
			Yii::app()->clientScript->registerScriptFile($baseUrl . '/slides.min.jquery.js');
		} else {
			throw new Exception('CarouselSlider - Error: Couldn\'t publish assets.');
		}
	}
}
/**
 * Other option:
 * preload (boolean) -> Set true to preload images in an image based slideshow. Default value is false.
 * preloadImage (string) -> Name and location of loading image for preloader. Default path is "/img/loading.gif".
 * container (string) -> Class name for slides container. Default class name is "slides_container".
 * generateNextPrev (boolean) -> Auto generate next/prev buttons. Default value is false.
 * next (string) -> Class name for next button. Default class name is "next".
 * prev (string) -> Class name for previous button. Default class name is "prev".
 * pagination (boolean) -> If you're not using pagination you can set to false, but don't have to.
 * generatePagination (boolean) -> Auto generate pagination. Default value is true.
 * paginationClass (string) -> Class name for pagination. Default class name is "pagination".
 * currentClass (string) -> Class name for current pagination item. Default class name is "current".
 * fadeSpeed (number) -> Set the speed of the fading animation in milliseconds. Default is 350 milliseconds.
 * fadeEasing (string) -> Set the easing of the fade animation. Must include Easing plugin in your project
 * slideSpeed (number) -> Set the speed of the sliding animation in milliseconds. Default is 350 milliseconds.
 * slideEasing (string) -> Set the easing of the sliding animation. Must include Easing plugin in your project
 * start (number) -> Set which slide you'd like to start with. Default is 1 and will start on the first slide.
 * effect (string) -> Set effect, slide or fade for next/prev and pagination. If you use just one effect name it'll be applied to both or you can state two effect names. The first name will be for next/prev and the second will be for pagination. Must be separated by a comma. Default effect is "slide", which will slide on both next/prev and pagination.
 * crossfade (boolean) -> Crossfade images in a image based slideshow. Default value is false.
 * randomize (boolean )-> Set to true to randomize slides. Default value is false.
 * play (number) -> Autoplay slideshow, a positive number will set to true and be the time between slide animation in milliseconds. Default value is 0 and is false.
 * pause (number) -> Pause slideshow on click of next/prev or pagination. A positive number will set to true and be the time of pause in milliseconds. Default value is 0 and is false.
 * hoverPause (boolean) -> Set to true and hovering over slideshow will pause it. Default value is false.
 * autoHeight (boolean) -> Set to true to auto adjust height. Default value is false.
 * autoHeightSpeed (number) -> Set auto height animation time in milliseconds. Default value is 350.
 * bigTarget (boolean) -> Set to true and the whole slide will link to next slide on click. Default value is false.
 * animationStart() (callback) -> Function called at the start of animation. Default value is empty.
 * animationComplete() (callback) -> Function called at the completion of animation Default value is empty.
*/
