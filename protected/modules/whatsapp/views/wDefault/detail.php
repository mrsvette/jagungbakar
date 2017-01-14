<?php
$this->breadcrumbs=array(
	ucfirst(Yii::app()->controller->module->id)=>array('/'.Yii::app()->controller->module->id.'/'),
	Yii::t('global','Detail').' '.Yii::t('WhatsappModule.whatsapp','Whatsapp'),
);

$this->menu=array(
	array('label'=>Yii::t('global','List').' '.Yii::t('WhatsappModule.whatsapp','Whatsapp'), 'url'=>array('view')),
);
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">
			Whatsapp from <b><?php echo $model->phone;?></b>
			<span class="pull-right fa fa-clock-o"> <?php echo date("d F Y H:i",strtotime($model->date_entry));?></span>
		</h4>
	</div>
	<div class="panel-body">
		<ul class="nav nav-tabs">
			<li class="active">
				<a data-toggle="tab" href="#general">
					<strong><?php echo Yii::t('WhatsappModule.whatsapp','Message');?></strong>
				</a>
			</li>
			<li class="">
				<a data-toggle="tab" href="#detail">
					<strong><?php echo Yii::t('WhatsappModule.whatsapp','Sender Detail');?></strong>
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div id="general" class="tab-pane active">
				<blockquote>
					<p><?php echo $model->message;?></p>
					<small><?php echo $model->phone;?></small>
				</blockquote>
			</div>
			<div id="detail" class="tab-pane">
				<div class="table-responsive">
				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'htmlOptions'=>array('class'=>'table table-striped mb30'),
					'attributes'=>array(
						array(
							'label'=>'phone',
							'type'=>'raw',
							'value'=>$model->phone,
						),
						array(
							'label'=>'message',
							'type'=>'raw',
							'value'=>$model->message,
						),
					),
				));
				?>
				</div>
			</div>
		</div> <!-- tab-content -->
	</div>
</div>
