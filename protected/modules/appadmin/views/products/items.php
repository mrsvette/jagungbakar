<?php
$this->breadcrumbs=array(
	ucfirst(Yii::app()->controller->module->id)=>array('/'.Yii::app()->controller->module->id.'/'),
	Yii::t('global','Manage').' '.Yii::t('menu','Product'),
);

$this->menu=array(
	array('label'=>Yii::t('global','List').' '.Yii::t('menu','Product'), 'url'=>array('admin')),
	array('label'=>Yii::t('global','List').' '.Yii::t('menu','Product Items'), 'url'=>array('view','id'=>$model->product_id)),
);
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-btns">
			<a class="panel-close" href="#">×</a>
			<a class="minimize" href="#">−</a>
		</div>
		<h4 class="panel-title"><?php echo CHtml::link($model->product_rel->name,array('appadmin/products/view','id'=>$model->product_id));?> / <?php echo $model->name;?></h4>
	</div>
	<div class="panel-body">
		<ul class="nav nav-tabs">
			<li class="">
				<a data-toggle="tab" href="#general">
					<strong>Detail Items</strong>
				</a>
			</li>
			<li class="active">
				<a data-toggle="tab" href="#update">
					<strong>Update Items</strong>
				</a>
			</li>
			<?php /*if($model->product_rel->type==1):?>
			<li class="">
				<a data-toggle="tab" href="#price">
					<strong>Prices Items</strong>
				</a>
			</li>
			<li class="">
				<a data-toggle="tab" href="#facility">
					<strong>Facility Items</strong>
				</a>
			</li>
			<?php endif;*/?>
			<li class="">
				<a data-toggle="tab" href="#image">
					<strong>Images Items</strong>
				</a>
			</li>
			<li class="">
				<a data-toggle="tab" href="#sub-items">
					<strong>Sub Items</strong>
				</a>
			</li>
			<li class="">
				<a data-toggle="tab" href="#create-sub-items">
					<strong>Create Sub Items</strong>
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div id="general" class="tab-pane">
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
							array(
								'name'=>'parent_id',
								'type'=>'raw',
								'value'=>CHtml::link($model->parent_rel->name,array('products/items','id'=>$model->parent_id)),
								'visible'=>($model->level>0),
							),
						),
					));?>
				</div>
			</div>
			<div id="update" class="tab-pane active">
				<?php echo $this->renderPartial('_form_item',array('model'=>$model,'product_id'=>$model->product_id));?>
			</div>
			<!--<div id="price" class="tab-pane">
				<?php echo $this->renderPartial('_price_item',array('item'=>$model,'model'=>$prices));?>
			</div>
			<div id="facility" class="tab-pane">
				<?php echo $this->renderPartial('_facility_item',array('item'=>$model,'model'=>$facilities));?>
			</div>-->
			<div id="image" class="tab-pane">
				<?php echo $this->renderPartial('_image_item',array('item'=>$model,'imageProvider'=>$imageProvider));?>
			</div>
			<div id="sub-items" class="tab-pane">
				<?php echo $this->renderPartial('_sub_item',array('subItemsProvider'=>$subItemsProvider));?>
			</div>
			<div id="create-sub-items" class="tab-pane">
				<?php echo $this->renderPartial('_form_sub_item',array('product_item'=>$model,'model'=>$model2));?>
			</div>
		</div>
	</div>
</div>
