<?php foreach($dataProvider->data as $model):?>
<div class="mix people col-sm-3" style="display: inline-block;">
	<div class="shadow-wrap">
		<div class="item-thumbs">
			<a class="fancybox hover-wrap" title="<?php echo $model->name;?>" data-fancybox-group="gallery" href="<?php echo Yii::app()->request->baseUrl.'/'.$model->image_one_rel->src.$model->image_one_rel->image;?>">
				<span class="overlay-img"></span><span class="overlay-img-thumb"><i class="fa fa-plus"></i></span>
			</a>
			<img class="img-responsive" alt="" src="<?php echo Yii::app()->request->baseUrl.'/'.$model->image_one_rel->thumb.$model->image_one_rel->image;?>">
		</div>
		<a href="#"><?php echo $model->name;?></a>
	</div>
</div>
<?php endforeach;?>
