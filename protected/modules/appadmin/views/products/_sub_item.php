<div class="row">
	<div class="col-sm-12">
		<?php
			$this->widget('zii.widgets.grid.CGridView', array(
				'dataProvider'=>$subItemsProvider,
				'itemsCssClass'=>'table table-striped mb30',
				'id'=>'sub-item-grid-view',
				'afterAjaxUpdate' => 'reloadGrid',
				'columns'=>array(
				array(
					'value'=>'$this->grid->dataProvider->getPagination()->getOffset()+$row+1',
				),
				array(
					'name'=>'name',
					'type'=>'raw',
					'value'=>'$data->name'
				),
				array(
					'name'=>'description',
					'type'=>'raw',
					'value'=>'$data->description'
				),
				array(
					'class'=>'CButtonColumn',
					'template'=>'{view}{delete}',
					'buttons'=>array(
							'view'=>array(
								'label'=>'<i class="fa fa-pencil"></i>',
								'imageUrl'=>false,
								'url'=>'Yii::app()->createUrl(\'appadmin/products/items\',array(\'id\'=>$data->id))',
								'options'=>array('title'=>'View'),
								'visible'=>'Rbac::ruleAccess(\'read_p\')',
										),
							'delete'=>array(
								'label'=>'<i class="fa fa-trash-o"></i>',
								'imageUrl'=>false,
								'url'=>'Yii::app()->createUrl(\'appadmin/products/deleteItems\',array(\'id\'=>$data->id))',
								'options'=>array('title'=>'Delete'),
								'visible'=>'Rbac::ruleAccess(\'delete_p\')',
							),
						),
						'htmlOptions'=>array('style'=>'width:10%;','class'=>'table-action'),
					),
			),
			));
		?>
	</div>
</div>
<script type="text/javascript">

</script>
