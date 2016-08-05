<div class="table-responsive">
	<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'htmlOptions'=>array('class'=>'table table-striped m-b-none text-sm'),
				'attributes'=>array(
					'name',
					'email',
					'phone',
					'company',
					'address',
					'note',
					array(
						'name'=>'catalogue_id',
						'value'=>$model->catalogue_rel->name,
					),
				),
	)); ?>
</div>
