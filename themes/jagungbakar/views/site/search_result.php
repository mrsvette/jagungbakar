<div class="row">
	<div class="col-md-12">
		<div class="content-head animated-in" data-animated="0">
			<h3>Search Site</h3>
			<p>
			<span>result</span>
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
