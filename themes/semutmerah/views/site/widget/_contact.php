<div class="col-lg-3 col-md-3 col-sm-12 clearfix">
	<div class="widget-title"><h3>Cotact Details</h3></div>
		<div class="contact_details" data-effect="helix">
			<div class="custom-box" data-effect="slide-top">
				<div class="contact_icons">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="custom-box-info">
					<p><a href="mailto:<?php echo Yii::app()->config->get('admin_email');?>"><?php echo Yii::app()->config->get('admin_email');?></a></p>
				</div>
			</div><!-- custom-box -->
			<div class="custom-box" data-effect="slide-top">
				<div class="contact_icons">
					<i class="fa fa-mobile-phone"></i>
				</div>
				<div class="custom-box-info">
					<p><?php echo Yii::app()->config->get('phone');?></p>
				</div>
			</div><!-- custom-box -->
			<div class="custom-box" data-effect="slide-top">
				<div class="contact_icons">
					<i class="fa fa-facebook"></i>
				</div>
				<div class="custom-box-info">
					<p>
						<a href="https://www.facebook.com/<?php echo Yii::app()->config->get('facebook');?>">
						<?php echo Yii::app()->config->get('facebook');?>
						</a>
					</p>
				</div>
			</div><!-- custom-box -->
			<div class="custom-box" data-effect="slide-top">
				<div class="contact_icons">
					<i class="fa fa-twitter"></i>
				</div>
				<div class="custom-box-info">
					<p>
						<a href="https://www.twitter.com/<?php echo Yii::app()->config->get('twitter');?>">
						@<?php echo Yii::app()->config->get('twitter');?>
						</a>
					</p>
				</div>
			</div><!-- custom-box -->
			<div class="custom-box" data-effect="slide-top">
				<div class="contact_icons">
					<i class="fa fa-home"></i>
				</div>
				<div class="custom-box-info">
					<p><?php echo Yii::app()->config->get('address');?></p>
				</div>
			</div><!-- custom-box -->
		</div><!-- end contact_details -->
</div><!-- end col-lg-3 -->
<div class="col-lg-6 col-md-6 col-sm-12 clearfix">
	<div class="widget-title"><h3>Contact Us</h3></div>
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
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<?php echo $form->textField($model,'name',array('class'=>'form-control','placeholder'=>'Name')); ?>
		<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Email')); ?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<?php echo $form->textField($model,'phone',array('class'=>'form-control','placeholder'=>'Phone')); ?>
		<?php echo $form->textField($model,'subject',array('class'=>'form-control','placeholder'=>'Subject')); ?>
    </div>
    <div class="clearfix"></div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php echo $form->textArea($model,'body',array('placeholder'=>'Message','rows'=>4, 'class'=>'form-control')); ?>
    </div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="row">
		<?php if(extension_loaded('gd')): ?>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php $this->widget('CCaptcha',array('clickableImage'=>true,'showRefreshButton'=>false)); ?>
			</div>
			<div class="col-md-8 col-sm-8 col-xs-12">
				<?php echo $form->textField($model,'verifyCode',array('placeholder'=>'Verification code','class'=>'form-control')); ?>
			</div>
		<?php endif; ?>
		<div class="col-md-4 col-sm-4 col-xs-12">
            <?php echo CHtml::submitButton(Yii::t('global','Submit'),array('class'=>'btn btn-primary small pull-right','style'=>'min-width:100px;')); ?>
		</div>
		</div>
	</div>
	<?php $this->endWidget(); ?>
</div><!-- end col-lg-6 -->
<div class="col-lg-3 col-md-3 col-sm-12 clearfix">
	<div class="widget-title"><h3>Support Center</h3></div>
	<div class="support_details" data-effect="helix">
		<div class="support_widget clearfix">
			<h4><a href="#">CLICK FOR CHAT</a></h4>
			<p>Lorem Ipsum is simply dummy text of the printing..</p>
		</div><!-- end support_widget -->
		<div class="forum_widget clearfix" data-effect="helix">
			<h4><a href="#">SUPPORT FORUM</a></h4>
			<p>Lorem Ipsum is simply dummy text of the printing..</p>
		</div><!-- end support_widget -->
	</div><!-- end support_details -->
</div><!-- end col-lg-3 -->
