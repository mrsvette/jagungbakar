<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-form',
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
			<?php echo $form->labelEx($model,'activity'); ?>
			<?php echo $form->textField($model,'activity',array('size'=>60,'maxlength'=>128)); ?>
			<?php echo $form->error($model,'activity'); ?>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'website'); ?>
			<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>128)); ?>
			<?php echo $form->error($model,'website'); ?>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'comment'); ?>
			<?php echo $form->textArea($model,'comment',array('rows'=>3)); ?>
			<?php echo $form->error($model,'comment'); ?>
		</div>
	</div>

	<?php if(!$model->isNewRecord):?>
	<div class="form-group col-md-6">
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/'.$model->photo);?>
	</div>
	<?php endif;?>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'photo'); ?>
		<?php echo $form->fileField($model,'photo',array('size'=>30,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'photo'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'),array('style'=>'min-width:100px;')); ?>
	</div>

<?php $this->endWidget(); ?>
