<?php
$this->breadcrumbs=array(
	'Member Groups'=>array('view'),
	Yii::t('global','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('global','List').' Member Group', 'url'=>array('view')),
	array('label'=>Yii::t('global','Create').' Member Group', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('member-group-grid', {
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
		<h4 class="panel-title"><?php echo Yii::t('global','Manage');?> Member Groups</h4>
	</div>
	<div class="panel-body">
		<p><?php echo Yii::t('global','You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.');?></p>

		<?php echo CHtml::link(Yii::t('global','Advanced Search'),'#',array('class'=>'search-button')); ?>
		<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div><!-- search-form -->
		<div class="table-responsive">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'member-group-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'itemsCssClass'=>'table table-striped mb30',
			'columns'=>array(
				array(
					'value'=>'$this->grid->dataProvider->getPagination()->getOffset()+$row+1',
				),
				'name',
				'code',
				'note',
				array(
					'class'=>'CButtonColumn',
					'template'=>'{update}{delete}{priviledge}',
					'buttons'=>array
						(
							'update'=>array(
									'visible'=>'Rbac::ruleAccess(\'update_p\')',
								),
							'delete'=>array(
									'visible'=>'Rbac::ruleAccess(\'delete_p\')',
								),	
							'priviledge' => array
								(
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/access.png',
									'label'=>'Priviledge',
									'url'=>'Yii::app()->createUrl("/appadmin/memberGroups/priviledge", array("id"=>$data->id))',
									//'visible'=>'Rbac::ruleAccess(\'delete_p\')',
								),
						),
				),
			),
		)); ?>
		</div>
	</div>
</div>
