<?php
$this->breadcrumbs=array(
	'Slide Show'=>array('view'),
	Yii::t('global','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('global','List').' Slide Show', 'url'=>array('view')),
	array('label'=>Yii::t('global','Create').' Slide Show', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('nivo-slider-grid', {
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
		<h4 class="panel-title"><?php echo Yii::t('global','Manage');?> Slide Show</h4>
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
			'id'=>'nivo-slider-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'itemsCssClass'=>'table table-striped mb30',
			'afterAjaxUpdate' => 'reloadGrid',
			'columns'=>array(
				array(
					'value'=>'$this->grid->dataProvider->getPagination()->getOffset()+$row+1',
				),
				array(
					'name'=>'title',
					'type'=>'raw',
					'value'=>'$data->title',
				),
				array(
					'name'=>'image',
					'value'=>'CHtml::link(CHtml::image(Yii::app()->request->baseUrl.\'/images/slider/\'.$data->image,$data->image,array(\'style\'=>\'width:200px;\')),array(\'/\'.Yii::app()->controller->module->id.\'/nivoslider/imageView\'),array(\'id\'=>$data->id,\'class\'=>\'img-view\'))',
					'type'=>'raw',
				),
				array(
					'name'=>'caption',
					'type'=>'raw',
					'value'=>'$data->caption',
				),
				'url',
				array(
					'name'=>'order',
					'value'=>'$data->order',
					'htmlOptions'=>array('style'=>'text-align:center;width:5%;'),
				),
				array(
					'class'=>'CButtonColumn',
					'template'=>'{update}{delete}',
					'buttons'=>array(
						'update'=>array(
							'imageUrl'=>false,
							'label'=>'<span class="glyphicon glyphicon-pencil"></span>',
							'options'=>array('title'=>'Update'),
							'visible'=>'Rbac::ruleAccess(\'update_p\')',
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

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Dialog box 1',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>'auto',
	),
	'themeUrl'=>Yii::app()->request->baseUrl.'/css/'.Yii::app()->theme->name,
	'theme'=>'jui',
));

    echo '<div id="div-for-image"></div>';

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<script type="text/javascript">
$(document).ready(function(){
$('a[class="img-view"]').each(function(){
		$(this).click(function(ev){
			ev.preventDefault();
			$.ajax({
				'beforeSend': function() { Loading.show(); },
				'complete': function() { Loading.hide(); },
				'url': this.href,
				'type':'post',
				'dataType': 'json',
				'data':{"imageid":this.id},
				'success': function(data){
					if(data.status=='success'){
						$('#div-for-image').html(data.div);
						$("#mydialog").dialog("open");
					return false;
					}
				},
			});
		});
	});
});
</script>
