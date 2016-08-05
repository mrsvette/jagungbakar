<!-- Responsive slider - START -->
<div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
	<div class="slides" data-group="slides">
		<ul>
			<?php foreach($this->imageList as $index=>$data): ?>
			<li>
				<div class="slide-body" data-group="slide">
		            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/'.$data['src']);?>
					<?php if(!empty($data['caption'])):?>
					<div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
						<?php echo $data['caption'];?>
						<?php if(!empty($data['sub_caption'])):?>
						<div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300">
							<?php echo $data['sub_caption'];?>
						</div>
						<?php endif;?>
		            </div>
					<?php endif;?>
					<?php if(!empty($data['right_image'])):?>
		            <div class="caption img-right" data-animate="slideAppearLeftToRight" data-delay="200">
		               <?php echo CHtml::image(Yii::app()->request->baseUrl.'/'.$data['right_image']);?>
		            </div>
					<?php endif;?>
              	</div>
			</li>
			<?php endforeach;?>
  	    	</ul>
        </div>
        <a class="slider-control left" href="#" data-jump="prev">&nbsp;</a>
        <a class="slider-control right" href="#" data-jump="next">&nbsp;</a>
        <div class="pages">
			<?php for($i=1; $i<=count($this->imageList); $i++):?>
			<?php echo CHtml::link($i,'#',array('class'=>'page','data-jump-to'=>$i));?>
			<?php endfor;?>
        </div>
</div>
<!-- Responsive slider - END -->
