<?php
$this->pageTitle='Installation - '.Yii::app()->name;
?>

<div class="container">
	<div class="row">
		<?php $form=$this->beginWidget('CActiveForm'); ?>
		<div class="col-sm-12">
			<h4><b>Application Configuration</b></h4><hr/>
			<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-warning alert-block alert-dismissable fade in')); ?>
			<div class="col-sm-6">
				<div class="form-group">
					<?php echo $form->labelEx($model,'application_name',array('class'=>'control-label')); ?>
					<?php echo $form->textField($model,'application_name',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'application_name'); ?>
				</div>

				<div class="form-group">
					<?php echo $form->labelEx($model,'language',array('class'=>'control-label')); ?>
					<?php echo $form->dropDownList($model,'language',$model->languageList(),array('class'=>'form-control')); ?>
				</div>
			</div>
			<div class="col-sm-6">
				<p>Set the Website Name</p>
				<p>Default language" determines the default locale settings (for dates, currencies, etc.), as well as the default language of the CMS interface. This can be changed for each user. </p>
				<p>Warning: The CMS interface may be missing translations in certain locales. </p>
			</div>
			<div class="clearfix space10"></div>
		</div>
		<div class="col-sm-12">
			<h4><b>Database Configuration</b></h4><hr/>
		</div>
		<div class="col-sm-12">
			<div class="col-sm-6">
				<div class="form-group">
					<?php echo $form->labelEx($model,'database_server',array('class'=>'control-label')); ?>
					<?php echo $form->textField($model,'database_server',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'database_server'); ?>
				</div>

				<div class="form-group">
					<?php echo $form->labelEx($model,'database_username',array('class'=>'control-label')); ?>
					<?php echo $form->textField($model,'database_username',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'database_username'); ?>
				</div>

				<div class="form-group">
					<?php echo $form->labelEx($model,'database_password',array('class'=>'control-label')); ?>
					<?php echo $form->passwordField($model,'database_password',array('class'=>'form-control')); ?>
				</div>

				<div class="form-group">
					<?php echo $form->labelEx($model,'database_name',array('class'=>'control-label')); ?>
					<?php echo $form->textField($model,'database_name',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'database_name'); ?>
				</div>
			</div>
			<div class="col-sm-6">
				<p><?php echo Yii::app()->name;?> stores its content in a relational SQL database. 
				Please provide the username and password to connect to the server here. 
				If this account has permission to create databases, then we will create the database for you; 
				otherwise, you must give the name of a database that already exists.</p>
				<p>Other databases:</p>
				<p>Databases in the list that are greyed out cannot currently be used. Click on them for more information and possible remedies.</p>
			</div>
			<div class="clearfix space10"></div>
		</div>
		<div class="col-sm-12">
			<h4><b>CMS Admin Account</b></h4><hr/>
			<div class="col-sm-6">
				<div class="form-group">
					<?php echo $form->labelEx($model,'admin_username',array('class'=>'control-label')); ?>
					<?php echo $form->textField($model,'admin_username',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'admin_username'); ?>
				</div>

				<div class="form-group">
					<?php echo $form->labelEx($model,'admin_password',array('class'=>'control-label')); ?>
					<?php echo $form->passwordField($model,'admin_password',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'admin_password'); ?>
				</div>
			</div>
			<div class="col-sm-6">
				<p>We will set up the first administrator account for you automatically. You can change these details later in the "Security" section within the CMS.</p>
			</div>
			<div class="clearfix space10"></div>
		</div>
		<div class="col-sm-12">
			<h4><b>Theme selection</b></h4><hr/>
			<div class="col-sm-6">
				<div class="form-group">
					<?php echo $form->radioButtonList($model,'theme',$model->themesList(),array('template'=>'{input} {label}')); ?>
				</div>
			</div>
			<div class="col-sm-6">
				<p>You can change the theme or download another from the SilverStripe website after installation. </p>
			</div>
			<div class="clearfix space10"></div>
		</div>
		<div class="col-sm-12">
			<?php echo CHtml::submitButton(Yii::t('install','Confirm Install'),array('style'=>'min-width:100px;','class'=>'btn btn-default')); ?>
			<div class="clearfix space10"></div>
		</div>

			<?php $this->endWidget(); ?>
	</div>
</div>
