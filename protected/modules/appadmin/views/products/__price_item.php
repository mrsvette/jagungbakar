<div class="row">
	<div class="form-group col-md-4">
		<?php echo CHtml::activeTextField($model,'name[]',array('size'=>80,'placeholder'=>$model->getAttributeLabel('name'),'maxlength'=>128,'value'=>$model->name,'class'=>'form-control')); ?>
		<?php echo CHtml::error($model,'name'); ?>
	</div>

	<div class="form-group col-md-3">
		<?php echo CHtml::activeTextField($model,'period[]',array('size'=>80,'placeholder'=>$model->getAttributeLabel('period'),'maxlength'=>128,'value'=>$model->period,'class'=>'form-control')); ?>
		<?php echo CHtml::error($model,'period'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo CHtml::activeTextField($model,'price[]',array('size'=>80,'placeholder'=>$model->getAttributeLabel('price'),'maxlength'=>128,'value'=>$model->price,'class'=>'form-control mask')); ?>
		<?php echo CHtml::error($model,'price'); ?>
	</div>
	
	<div class="form-group col-md-1">
		<?php echo CHtml::link('<span class="fa fa-plus"></span>','javascript:void(0);',array('onclick'=>'addPrice();'));?>
		<?php echo CHtml::link('<span class="fa fa-trash-o"></span>','javascript:void(0);',array('onclick'=>'deletePrice(this);'));?>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$('.mask').maskMoney({symbol:'Rp ', showSymbol:false, thousands:'.', decimal:',', symbolStay: true});
	});
</script>
