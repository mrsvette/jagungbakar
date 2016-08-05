<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banner-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype' =>'multipart/form-data'),
)); ?>

	<p class="note"><?php echo Yii::t('global','Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-warning alert-block alert-dismissable fade in')); ?>
	<div class="col-md-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',Lookup::items('ProductType','- Choose Type -')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'src'); ?>
		<?php echo $form->fileField($model,'src',array('size'=>30,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'src'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->fileField($model,'file',array('size'=>30,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'file'); ?>
	</div>
	</div>
	<div class="col-md-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>10)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'),array('style'=>'min-width:100px;')); ?>
	</div>
	</div>

<?php $this->endWidget(); ?>
