<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('class'=>'row','id'=>'comments_form'),
)); ?>
	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textField($model,'author',array('size'=>30,'maxlength'=>128,'placeholder'=>'Name','class'=>'form-control')); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>128,'placeholder'=>'Email','class'=>'form-control')); ?>
		<?php echo $form->textField($model,'url',array('size'=>30,'maxlength'=>128,'placeholder'=>'Website','class'=>'form-control')); ?>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<?php echo $form->textArea($model,'content',array('rows'=>3, 'cols'=>40,'placeholder'=>'Message','class'=>'form-control')); ?>
		<?php echo CHtml::submitButton(Yii::t('global','Save'),array('style'=>'min-width:100px;','class'=>'btn btn-primary')); ?>
	</div>
<?php $this->endWidget(); ?>
