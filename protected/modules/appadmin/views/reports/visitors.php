<?php
$this->breadcrumbs=array(
	'Params'=>array('view'),
	Yii::t('global','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('global','List').' Reports', 'url'=>array('visitors')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('visitors-grid', {
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
		<h4 class="panel-title">Laporan Pengunjung</h4>
	</div>
	<div class="panel-body">
		<ul class="nav nav-tabs nav-justified">
			<li class="active">
				<a data-toggle="tab" href="#unique-visitors">
					<i class="glyphicon glyphicon-tasks"></i> <strong>Unique Visitors</strong>
				</a>
			</li>
			<li>
				<a data-toggle="tab" href="#detail-visits">
					<i class="glyphicon glyphicon-tasks"></i> <strong>Detail Visits</strong>
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div id="unique-visitors" class="tab-pane active">
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'unique-visitors-grid',
					'dataProvider'=>$uniquesProvider,
					'itemsCssClass'=>'table table-striped mb30',
					'afterAjaxUpdate' => 'reloadGrid',
					'columns'=>array(
						array(
							'value'=>'$this->grid->dataProvider->getPagination()->getOffset()+$row+1',
						),
						array(
							'name'=>'ip_address',
							'value'=>'$data[\'ip_address\']',
						),
						array(
							'header'=>'Visited Date',
							'value'=>'date("d-m-Y H:i",strtotime($data[\'date_from\']))',
						),
						array(
							'header'=>'Visited Date to',
							'value'=>'date("d-m-Y H:i",strtotime($data[\'date_to\']))',
						),
						array(
							'name'=>'duration',
							'value'=>'$data[\'duration\']',
						),
					),
				)); ?>
			</div>
			<div id="detail-visits" class="tab-pane">
				<p>
				<?php echo Yii::t('global','You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.');?>
				</p>

				<?php echo CHtml::link(Yii::t('global','Advanced Search'),'#',array('class'=>'search-button')); ?>
				<div class="search-form" style="display:none">
				<?php $this->renderPartial('_search',array(
					'model'=>$dataProvider->model,
				)); ?>
				</div><!-- search-form -->
				<div class="table-responsive">
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'visitors-grid',
					'dataProvider'=>$dataProvider,
					'itemsCssClass'=>'table table-striped mb30',
					'afterAjaxUpdate' => 'reloadGrid',
					'columns'=>array(
						array(
							'value'=>'$this->grid->dataProvider->getPagination()->getOffset()+$row+1',
						),
						array(
							'name'=>'date_entry',
							'type'=>'raw',
							'value'=>'date("d-m-Y",strtotime($data->date_entry))',
						),
						array(
							'header'=>'Jml Pengunjung',
							'type'=>'raw',
							'value'=>'$data->countVisitor',
							'htmlOptions'=>array('style'=>'text-align:center;'),
						),
						array(
							'header'=>'IP Pengunjung',
							'type'=>'raw',
							'value'=>'$data->visitors',
						),
						array(
							'header'=>'Jml Halaman Terkunjungi',
							'type'=>'raw',
							'value'=>'$data->countPageViewed',
							'htmlOptions'=>array('style'=>'text-align:center;'),
						),
						array(
							'header'=>'Halaman Terkunjungi',
							'type'=>'raw',
							'value'=>'$data->pageViewed',
						),
					),
				)); ?>
				</div>
			</div><!-- detail-visits -->
		</div><!-- tab-content -->
	</div>
</div>
