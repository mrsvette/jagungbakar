<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>true,
)); ?>
	
	<div class="row">
		<div class="col-md-6">
			<span><i class="fa fa-user"></i></span>
			<?php echo $form->textField($model,'author',array('size'=>30,'maxlength'=>128,'placeholder'=>'Name')); ?>
			<span><i class="fa fa-envelope-o"></i></span>
			<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>128,'placeholder'=>'Email')); ?>
			<span><i class="fa fa-link"></i></span>
			<?php echo $form->textField($model,'url',array('size'=>30,'maxlength'=>128,'placeholder'=>'Website')); ?>
		</div>
		<div class="col-md-6">
			<?php echo $form->textArea($model,'content',array('rows'=>1, 'cols'=>40,'placeholder'=>'Message')); ?>
			<?php //echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'),array('style'=>'min-width:100px;')); ?>
			<button type="submit">Post a Comment</button>
		</div>
	</div>
<?php $this->endWidget(); ?>
