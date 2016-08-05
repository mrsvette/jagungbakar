<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<div class="page-header position-relative">
	<h3><i class="icon-phone"></i> <?php echo Yii::t('contact','Contact Us');?></h3>
</div><!--/.page-header-->

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
<?php echo Yii::t('contact','If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.');?>
</p>

<div class="form wide">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note"><?php echo Yii::t('global','Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>3,'cols'=>60)); ?>
		<?php /*
		<label>
		<?php
			$this->widget('application.extensions.cleditor.ECLEditor', array(
							'model'=>$model,
							'attribute'=>'body', //Model attribute name. Nome do atributo do modelo.
							'options'=>array(
								'height'=>'100px',
								'useCSS'=>true,
								'controls'=>'bold italic underline | alignleft center alignright justify | cut copy paste pastetext | numbering image source',
							),
							'value'=>$model->body,
					));
		?>
		</label>*/?>
	</div>

	<?php if(extension_loaded('gd')): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<?php $this->widget('CCaptcha',array('clickableImage'=>true,'showRefreshButton'=>false)); ?>
	</div>
	<div class="row">
		<label>&nbsp;</label>
		<?php echo $form->textField($model,'verifyCode'); ?>
	</div>
	<div class="row">
		<label>&nbsp;</label>
		<div class="hint"><?php echo Yii::t('contact','Please enter the letters as they are shown in the image above.<br/>Letters are not case-sensitive.');?></div>
	</div>
	<?php endif; ?>

	<div class="row submit">
		<?php echo CHtml::submitButton(Yii::t('global','Submit'),array('style'=>'min-width:100px;','class'=>'btn btn-small btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
