<div class="comment-form">
	<div class="content-head">
		<h3>Contact Us</h3>
		<p><span>send us a message</span></p>
	</div>
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'contactForm',
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array('class'=>'form-horizontal','role'=>'form'),
	)); ?>
	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-warning alert-block alert-dismissable fade in')); ?>

	<?php if(Yii::app()->user->hasFlash('contact')): ?>
	<div class="alert alert-success">
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<?php echo Yii::app()->user->getFlash('contact'); ?>
	</div>
	<?php endif; ?>
	<div class="col-sm-6">
		<span><i class="fa fa-user"></i></span>
		<?php echo $form->textField($model,'name',array('placeholder'=>'Name')); ?>
		<span><i class="fa fa-envelope-o"></i></span>
		<?php echo $form->textField($model,'email',array('placeholder'=>'Email')); ?>
		<span><i class="fa fa-phone"></i></span>
		<?php echo $form->textField($model,'phone',array('placeholder'=>'Phone')); ?>
		<span><i class="fa fa-home"></i></span>
		<?php echo $form->textField($model,'company',array('placeholder'=>'Company')); ?>
		<?php echo $form->hiddenField($model,'subject',array('value'=>'Kontak User')); ?>
	</div>
	<div class="col-sm-6">
		<div class="clearfix padding10">
			<?php echo $form->textArea($model,'body',array('placeholder'=>'Message','rows'=>4)); ?>
			<?php if(extension_loaded('gd')): ?>
			<div class="row">
				<div class="col-sm-4">
				<?php $this->widget('CCaptcha',array('clickableImage'=>true,'showRefreshButton'=>false)); ?>
				</div>
				<div class="col-sm-8 no-padding">
					<span><i class="fa fa-lock"></i></span>
					<?php echo $form->textField($model,'verifyCode',array('placeholder'=>'Verification code')); ?>
				</div>
			</div>
			<?php endif; ?>
			<span><i class="fa fa-floppy-o"></i></span>
			<?php echo CHtml::submitButton(Yii::t('global','Submit'),array('class'=>'btn btn-block','style'=>'min-width:100px;')); ?>
		</div>
	</div>
	<?php $this->endWidget(); ?>
</div>
