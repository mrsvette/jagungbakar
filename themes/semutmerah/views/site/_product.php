<div class="col-xs-6 col-sm-6 col-md-4 image">
	<div class="thmb-prev">
	<a data-rel="prettyPhoto" href="javascript:void(0);" href-rel="<?php echo Yii::app()->request->baseUrl.'/'.$data->image_one_rel->src.$data->image_one_rel->image;?>" rel="prettyPhoto">
		<?php if(!empty($data->image_one_rel->thumb)):?>
		<img class="img-responsive" alt="" src="<?php echo Yii::app()->request->baseUrl.'/'.$data->image_one_rel->thumb.$data->image_one_rel->image;?>">
		<?php else:?>
		<img class="img-responsive" alt="" src="<?php echo Yii::app()->request->baseUrl.'/'.$data->image_one_rel->src.$data->image_one_rel->image;?>">
		<?php endif;?>
	</a>
	</div>
	<h5 class="fm-title">
		<?php echo CHtml::link($data->name,array('#'));?>
	</h5>
	<ul>
	<?php foreach($data->facility_rel as $facility):?>
		<li><?php echo $facility->name;?></li>
	<?php endforeach;?>
	</ul>
</div>
