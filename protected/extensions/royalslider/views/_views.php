<!-- Royal Slider -->
<?php if(is_array($this->imageList)):?>
<div class="laptopBg">
	<?php echo CHtml::image($this->baseUrl.'/laptop.png','',array('class'=>'imgBg'));?>
	<div id="slider-in-laptop" class="royalSlider rsDefaultInv">
	<?php foreach($this->imageList as $index=>$data): ?>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/'.$data['image_url'],$data['title'],array('class'=>'img-responsive'));?>
	<?php endforeach;?>
	</div>
</div>
<?php endif;?>
<script type="text/javascript">
if (window.addEventListener){ // W3C standard
	window.addEventListener('load', slide, false); // NB **not** 'onload'
}else if (window.attachEvent){ // Microsoft
	window.attachEvent('onload', slide);
}
function slide(){
	jQuery(document).ready(function($) {
    var rsi = $('#slider-in-laptop').royalSlider({
        autoHeight: false,
        arrowsNav: false,
        fadeinLoadedSlide: false,
        controlNavigationSpacing: 0,
        controlNavigation: 'bullets',
        imageScaleMode: 'fill',
        imageAlignCenter: true,
        loop: true,
        loopRewind: false,
        numImagesToPreload: 6,
        keyboardNavEnabled: true,
        autoScaleSlider: true,  
        autoScaleSliderWidth: 486,     
        autoScaleSliderHeight: 315,
    
        /* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
        imgWidth: 792,
        imgHeight: 479
      }).data('royalSlider');
	});
}
</script>
