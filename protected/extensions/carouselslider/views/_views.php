<div class="col-sm-12">
	<div id="slides" class="row">
		<div class="slides_container col-sm-12">
			<?php 
			$imageLists=array_chunk($this->imageList,$this->eachNumber);
			$cols=(int)12/$this->eachNumber;
			foreach($imageLists as $index=>$data){?>
			<div class="slide row">
				<?php foreach($data as $index2=>$data2){?>
				<div class="item col-sm-<?php echo $cols;?>" style="min-height:180px;">
					<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/'.$data2['thumb_url'].$data2['image_thumb'],'',array('class'=>'img-responsive')),$data2['link']);?>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<!-- image list ex -->
<!--
<div class="slide">
		<div class="item">
			Item One
		</div>
		<div class="item">
			Item Two
		</div>
</div>
<div class="slide">
		<div class="item">
			Item Six
		</div>
		<div class="item">
			Item Seven
		</div>
		<div class="item">
			Item Eight
		</div>
</div>
-->
