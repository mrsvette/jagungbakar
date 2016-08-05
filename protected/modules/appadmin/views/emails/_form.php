<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'email-template-form',
	'enableAjaxValidation'=>false
)); ?>

	<p class="note"><?php echo Yii::t('global','Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-warning alert-block alert-dismissable fade in')); ?>
	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>
	<div class="form-group col-md-8">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>
	<div class="form-group col-md-3">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->dropDownList($model,'category',Lookup::items('EmailCategory')); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>
	<div class="form-group col-md-3">
		<?php echo $form->labelEx($model,'enabled'); ?>
		<?php echo $form->dropDownList($model,'enabled',Lookup::items('EmailStatus')); ?>
		<?php echo $form->error($model,'enabled'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	<div class="form-group col-md-12">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php 
			$this->widget('ext.redactor.ERedactorWidget',array(
				'model'=>$model,
				'attribute'=>'content',
				'options'=>array(
					'convertDivs'=> false,
				),
				'htmlOptions'=>array('value'=>(!$model->isNewRecord)? $model->content:''),
			));
		?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'),array('style'=>'min-width:100px;')); ?>
	</div>

<?php $this->endWidget(); ?>
