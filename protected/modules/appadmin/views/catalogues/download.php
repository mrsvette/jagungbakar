<?php
$this->breadcrumbs=array(
	'Download Request'=>array('view'),
	Yii::t('global','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('global','List').' Download Request', 'url'=>array('view')),
	array('label'=>Yii::t('global','Create').' Download Request', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('banner-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-btns">
			<a class="panel-close" href="#">×</a>
			<a class="minimize" href="#">−</a>
		</div>
		<h4 class="panel-title"><?php echo Yii::t('global','Manage');?> Download Request</h4>
	</div>
	<div class="panel-body">
		<p><?php echo Yii::t('global','You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.');?></p>

		<div class="table-responsive">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'download-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'itemsCssClass'=>'table table-striped mb30',
			'afterAjaxUpdate' => 'initFunction',
			'columns'=>array(
				array(
					'value'=>'$this->grid->dataProvider->getPagination()->getOffset()+$row+1',
				),
				'name',
				'email',
				'address',
				array(
					'name'=>'catalogue_id',
					'value'=>'$data->catalogue_rel->name',
					'filter'=>CHtml::activeTextField($model,'catalogue'),
				),
				array(
					'name'=>'approved',
					'value'=>'CHtml::dropDownList(\'approval\',$data->approved,Lookup::items(\'DownloadApproval\'),array(\'rel_id\'=>$data->id))',
					'type'=>'raw',
				),
				array(
					'class'=>'CButtonColumn',
					'template'=>'{view}{delete}',
					'buttons'=>array(
						'view'=>array(
							'imageUrl'=>false,
							'url'=>'Yii::app()->createUrl("appadmin/catalogues/detail", array("id"=>$data->id))',
							'label'=>'<span class="glyphicon glyphicon-search"></span>',
							'options'=>array('title'=>'View','id'=>'view'),
							'visible'=>'Rbac::ruleAccess(\'read_p\')',
						),
						'delete'=>array(
							'imageUrl'=>false,
							'label'=>'<span class="glyphicon glyphicon-trash"></span>',
							'options'=>array('title'=>'Delete'),
							'visible'=>'Rbac::ruleAccess(\'delete_p\')',
						),	
					),
					'visible'=>Rbac::ruleAccess('update_p'),
					'htmlOptions'=>array('style'=>'width:10%;','class'=>'table-action'),
				),
			),
		)); ?>
		</div>
	</div>
</div>
<button class="btn btn-primary btn-lg" data-target="#myModal" data-toggle="modal" style="display:none;"> Launch Modal </button>
<div id="myModal" class="modal fade" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
				<h4 id="myModalLabel" class="modal-title">Detail Download Request</h4>
			</div>
			<div class="modal-body"> Content goes here... </div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$('.yiiPager').addClass('dataTables_paginate paging_full_numbers');
	$('.dataTables_paginate').removeClass('yiiPager');
	initFunction();
});
function initFunction(){
	$('input[type=text]').addClass('form-control');
	$('textarea').addClass('form-control');
	$('select').addClass('form-control');
	$('a[id="view"]').click(function(){	
		$this=$(this);
		$.ajax({
			'beforeSend': function() { Loading.show(); },
			'complete': function() { Loading.hide(); },
			'url': $this.attr('href'),
			'type':'post',
			'dataType': 'json',
		  	'success': function(data){
				if(data.status=='success'){
					$('.modal-body').html(data.div);
					$('button[data-toggle="modal"]').trigger('click');
				}
			},
		});
		return false;
	});
	$('select[name="approval"]').change(function(){	
		$this=$(this);
		$.ajax({
			'beforeSend': function() { Loading.show(); },
			'complete': function() { Loading.hide(); },
			'url': "<?php echo Yii::app()->createUrl('/appadmin/catalogues/approval');?>",
			'type':'post',
			'dataType': 'json',
			'data':{'id':$this.attr('rel_id'),'value':$this.val()},
		  	'success': function(data){
				if(data.status=='success'){
					$.fn.yiiGridView.update("download-grid", {
						data: $(this).serialize()
					});
				}
			},
		});
		return false;
	});
}
</script>
