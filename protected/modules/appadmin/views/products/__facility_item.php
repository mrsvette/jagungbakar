<div class="row">
	<div class="form-group col-md-4">
		<?php echo CHtml::activeTextField($model,'name[]',array('size'=>80,'placeholder'=>$model->getAttributeLabel('name'),'maxlength'=>128,'value'=>$model->name,'class'=>'form-control')); ?>
		<?php echo CHtml::error($model,'name'); ?>
	</div>

	<div class="form-group col-md-7">
		<?php echo CHtml::activeTextField($model,'description[]',array('size'=>80,'placeholder'=>$model->getAttributeLabel('description'),'maxlength'=>128,'value'=>$model->description,'class'=>'form-control')); ?>
		<?php echo CHtml::error($model,'description'); ?>
	</div>
	
	<div class="form-group col-md-1">
		<?php echo CHtml::link('<span class="fa fa-plus"></span>','javascript:void(0);',array('onclick'=>'addFacility();'));?>
		<?php echo CHtml::link('<span class="fa fa-trash-o"></span>','javascript:void(0);',array('onclick'=>'deleteFacility(this);'));?>
	</div>
</div>
