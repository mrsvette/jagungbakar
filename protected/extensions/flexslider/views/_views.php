<!-- FLEXSLIDER -->
<?php if(is_array($this->imageList)):?>
<div class="container slider">
	<div class="row">
		<div class="col-md-12">
			<div id="home-slider" class="flexslider">
				<ul class="slides">
					<?php foreach($this->imageList as $index=>$data): ?>
					<li>
						<?php echo CHtml::image(Yii::app()->request->baseUrl.'/'.$data['image_url'],$data['title'],array('class'=>'img-responsive'));?>
						<?php if(!empty($data['caption'])):?>
						<p class="flex-caption"><?php echo $data['caption'];?></p>
						<?php endif;?>
					</li>
					<?php endforeach;?>
				</ul>
			</div>
			<ul class="home-slider-nav">
				<?php for($i=1; $i<=count($this->imageList); $i++):?>
				<li><span><?php echo $i;?></span></li>
				<?php endfor;?>
			</ul>
		</div>
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
    $('#home-slider').flexslider({
        animation: "fade", //String: Select your animation type, "fade" or "slide"
        slideshow: true,
        directionNav: true, //Boolean: Create navigation for previous/next navigation? (true/false)
        slideshowSpeed: "<?php echo $this->slideshowSpeed;?>",
        animationSpeed: "<?php echo $this->animationSpeed;?>",
        controlsContainer: ".slider",
        controlNav: true,
        manualControls: ".home-slider-nav li",
        start: function(slider) {
            $('body').removeClass('loading');
        }
    });
}
</script>
