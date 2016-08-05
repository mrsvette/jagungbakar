<!-- Owl slider - START -->
<div class="owl-slider-1 slider-wrapper">
	<?php foreach($this->imageList as $index=>$data): ?>
	<div>
        <?php echo CHtml::image(Yii::app()->request->baseUrl.'/'.$data['image_url'],'',array('class'=>'img-full','alt'=>$data['title']));?>
	</div>
	<?php endforeach;?>
</div>
<!-- Owl slider - END -->
