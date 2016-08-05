<div class="row">
	<div class="col-md-12">
		<div class="content-head animated-in" data-animated="0">
			<h3><?php echo Yii::t('global','Search Site');?></h3>
			<p>
			<span><?php echo Yii::t('global','Search Result');?></span>
			</p>
		</div>
		<div class="row">
			<?php $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_search_result',
					'template'=>"{items}\n{pager}",
			)); ?>
		</div>
	</div>
</div>
