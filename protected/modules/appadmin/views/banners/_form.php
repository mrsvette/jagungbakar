<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banner-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype' =>'multipart/form-data'),
)); ?>

	<p class="note"><?php echo Yii::t('global','Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-warning alert-block alert-dismissable fade in')); ?>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>3)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group col-md-12">
		<?php echo $form->labelEx($model,'src'); ?>
		<?php echo $form->fileField($model,'src',array('size'=>30,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'src'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'expired_date'); ?>
		<?php 
		Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
		$this->widget('CJuiDateTimePicker',array(
					'model'=>$model, //Model object
					'attribute'=>'expired_date', //attribute name
					'mode'=>'datetime', //use "time","date" or "datetime" (default)
					'options'=>array(
						'showAnim'=>'fold',
						'dateFormat'=>'yy-mm-dd',
						'changeMonth' => 'true',
						'changeYear'=>'true',
						'constrainInput' => 'true'
					),
				));
		?>
		<?php echo $form->error($model,'expired_date'); ?>
	</div>

	<div class="form-group col-md-12">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'),array('style'=>'min-width:100px;')); ?>
	</div>

<?php $this->endWidget(); ?>
