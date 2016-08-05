  <section id="map"></section><!-- end map-->
  <section id="directions">
  	<div class="container">
    	<div class="row">
        <div class="col-md-8 col-md-offset-2">
       <form action="http://maps.google.com/maps" method="get" target="_blank">
				<div class="input-group">
					<input type="text" name="saddr" placeholder="Enter your starting point" class="form-control style-2" />
					<input type="hidden" name="daddr" value="New York, NY 11430"/><!-- Write here your end point -->
					<span class="input-group-btn">
					<button class="btn" type="submit" value="Get directions" style="margin-left:0;">GET DIRECTIONS</button>
					</span>
				</div><!-- /input-group -->
			</form>
          </div>
        </div>
    </div>
  </section>
  
<section id="main_content" >
<div class="container">
<div class="row">
	<div class="col-md-4">
		<h3>Address</h3>
		<ul id="contact-info">
			<li><i class="icon-home"></i> <?php echo Yii::app()->config->get('address');?></li>
			<li><i class="icon-phone"></i> <?php echo Yii::app()->config->get('phone');?></li>
			<li><i class=" icon-email"></i> <a href="mailto:<?php echo Yii::app()->config->get('admin_email');?>"><?php echo Yii::app()->config->get('admin_email');?></a></li>
		</ul>
		<hr>
		<h3>Follow us</h3>
		<p>
			Cu affert populo neglegentur has, labore nostrum periculis ius in, singulis electram ad vel labore.
		</p>
		<ul id="follow_us_contacts">
			<li><a href="#"><i class="icon-facebook"></i><?php echo Yii::app()->config->get('facebook');?></a></li>
			<li><a href="#"><i class="icon-twitter"></i><?php echo Yii::app()->config->get('twitter');?></a></li>
			<li><a href="#"><i class=" icon-google"></i><?php echo Yii::app()->config->get('google_plus');?></a></li>
		</ul>
        <hr>
		<h3>Apply for a course</h3>
        <p>
			Cu affert populo neglegentur has, labore nostrum periculis ius in, singulis electram ad vel labore.
		</p>
        <a href="#" class="button_medium_outline">Apply</a>
	</div>
	<div class="col-md-8">
		<div class=" box_style_2">
			<span class="tape"></span>
			<div class="row">
				<div class="col-md-12">
					<h3>General Enquire</h3>
				</div>
			</div>
			<div id="message-contact"></div>
			<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'contact-form',
					'enableAjaxValidation'=>false,
			)); ?>
			<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-warning alert-block alert-dismissable fade in')); ?>

			<?php if(Yii::app()->user->hasFlash('contact')): ?>
			<div class="alert alert-success">
				<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
				<?php echo Yii::app()->user->getFlash('contact'); ?>
			</div>
			<?php endif; ?>
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<?php echo $form->textField($model,'name',array('class'=>'form-control style_2','placeholder'=>'Name')); ?>
							<span class="input-icon"><i class="icon-user"></i></span>
							<?php echo $form->error($model,'name'); ?>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<?php echo $form->textField($model,'email',array('class'=>'form-control style_2','placeholder'=>'Email')); ?>
							<span class="input-icon"><i class="icon-email"></i></span>
							<?php echo $form->error($model,'email'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<?php echo $form->textField($model,'company',array('class'=>'form-control style_2','placeholder'=>'Company')); ?>
							<span class="input-icon"><i class="icon-home"></i></span>
							<?php echo $form->error($model,'company'); ?>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<?php echo $form->textField($model,'phone',array('class'=>'form-control style_2','placeholder'=>'Phone Number')); ?>
							<span class="input-icon"><i class="icon-phone"></i></span>
							<?php echo $form->error($model,'phone'); ?>
						</div>
					</div>
				</div>
				<?php echo $form->hiddenField($model,'subject',array('value'=>'Kontak User')); ?>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php echo $form->textArea($model,'body',array('class'=>'form-control','placeholder'=>'Message','rows'=>4, 'style'=>'height:200px;')); ?>
							<?php echo $form->error($model,'body'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<?php if(extension_loaded('gd')): ?>
					<div class="col-md-6">
						<?php echo $form->textField($model,'verifyCode',array('class'=>'form-control','placeholder'=>'Verification code')); ?>
						<?php echo $form->error($model,'verifyCode'); ?>
					</div>
					<div class="col-md-6">
						<?php $this->widget('CCaptcha',array('clickableImage'=>true,'showRefreshButton'=>false)); ?>
					</div>
					<?php endif; ?>
					<div class="col-md-12">
						<?php echo CHtml::submitButton(Yii::t('global','Submit'),array('class'=>'button_medium','style'=>'min-width:100px;')); ?>
					</div>
				</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>
</div>
</section>
