<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>true,
)); ?>
	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-warning alert-block alert-dismissable fade in')); ?>

	<div class="form-group">
		<?php echo $form->textField($model,'author',array('size'=>30,'maxlength'=>128,'placeholder'=>'Name','class'=>'form-control style_2')); ?>
	</div>
	<div class="form-group">
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>128,'placeholder'=>'Email','class'=>'form-control style_2')); ?>
	</div>
	<div class="form-group">
		<?php echo $form->textField($model,'url',array('size'=>30,'maxlength'=>128,'placeholder'=>'Website','class'=>'form-control style_2')); ?>
	</div>
	<div class="form-group">
		<?php echo $form->textArea($model,'content',array('rows'=>3, 'cols'=>40,'placeholder'=>'Message','class'=>'form-control style_2', 'style'=>'height:150px;')); ?>
	</div>
	<div class="form-group">
		<?php echo CHtml::submitButton(Yii::t('global','Post Comment'),array('style'=>'min-width:100px;','class'=>'button_medium')); ?>
	</div>
<?php $this->endWidget(); ?>
