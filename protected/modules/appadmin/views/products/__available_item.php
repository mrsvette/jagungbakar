<div class="row">
	<div class="form-group col-md-4">
		<?php echo CHtml::activeTextField($model,'name[]',array('size'=>80,'placeholder'=>$model->getAttributeLabel('name'),'maxlength'=>128,'value'=>$model->name,'class'=>'form-control')); ?>
		<?php echo CHtml::error($model,'name'); ?>
	</div>

	<div class="form-group col-md-3">
		<?php echo CHtml::activeTextField($model,'description[]',array('placeholder'=>$model->getAttributeLabel('description'),'maxlength'=>128,'value'=>$model->description,'class'=>'form-control')); ?>
		<?php echo CHtml::error($model,'period'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo CHtml::activeDropDownList($model,'status[]',array(1=>'Available',0=>'Unavailable'),array('value'=>$model->status,'class'=>'form-control')); ?>
		<?php echo CHtml::error($model,'status'); ?>
	</div>
	
	<div class="form-group col-md-1">
		<?php echo CHtml::link('<span class="fa fa-plus"></span>','javascript:void(0);',array('onclick'=>'addAvailable();'));?>
		<?php echo CHtml::link('<span class="fa fa-trash-o"></span>','javascript:void(0);',array('onclick'=>'deleteAvailable(this);'));?>
	</div>
</div>
