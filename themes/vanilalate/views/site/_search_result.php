<div class="col-md-12">
	<b><?php echo CHtml::link($data->findReplace(Yii::app()->user->getState('Search_key'),$data->content_rel->title),$data->url);?></b>
	<p style="padding-left:20px;"><?php echo $data->findReplace(Yii::app()->user->getState('Search_key'),$data->parseContent2(20));?></p>
</div>
