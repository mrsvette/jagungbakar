<?php
$this->breadcrumbs=array(
	ucfirst(Yii::app()->controller->module->id)=>array('/'.Yii::app()->controller->module->id.'/'),
	Yii::t('global','Manage').' '.Yii::t('menu','Product'),
);

$this->menu=array(
	array('label'=>Yii::t('global','List').' '.Yii::t('menu','Product'), 'url'=>array('admin')),
	array('label'=>Yii::t('global','Create').' '.Yii::t('menu','Product'), 'url'=>array('create')),
);
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-btns">
			<a class="panel-close" href="#">×</a>
			<a class="minimize" href="#">−</a>
		</div>
		<h4 class="panel-title"><?php echo $model->name;?></h4>
	</div>
	<div class="panel-body">
		<ul class="nav nav-tabs">
			<li class="">
				<a data-toggle="tab" href="#info">
					<strong>Info Produk</strong>
				</a>
			</li>
			<li class="active">
				<a data-toggle="tab" href="#update">
					<strong>Ubah Produk</strong>
				</a>
			</li>
			<li class="">
				<a data-toggle="tab" href="#general">
					<strong>Item Produk</strong>
				</a>
			</li>
			<li class="">
				<a data-toggle="tab" href="#create">
					<strong>Item Baru</strong>
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div id="info" class="tab-pane">
				<div class="table-responsive">
					<?php $this->widget('zii.widgets.CDetailView', array(
						'data'=>$model,
						'htmlOptions'=>array('class'=>'table table-striped mb30'),
						'attributes'=>array(
							array(
								'name'=>'id',
								'type'=>'raw',
								'value'=>$model->id
							),
							array(
								'name'=>'name',
								'type'=>'raw',
								'value'=>$model->name
							),
							array(
								'name'=>'description',
								'type'=>'raw',
								'value'=>$model->description
							),
						),
					));?>
				</div>
			</div>
			<div id="update" class="tab-pane active">
				<?php echo $this->renderPartial('_form_product',array('model'=>$model));?>
			</div>
			<div id="general" class="tab-pane">
				<div class="table-responsive">
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'dataProvider'=>$dataProvider,
					'itemsCssClass'=>'table table-striped mb30',
					'id'=>'product-items-grid',
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
							'buttons'=>array
								(
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
				)); ?>
				</div>
			</div>
			<div id="create" class="tab-pane">
				<?php echo $this->renderPartial('_form_item',array('model'=>$model2,'product_id'=>$model->id));?>
			</div>
		</div>
	</div>
</div>
