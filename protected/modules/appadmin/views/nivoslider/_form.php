<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nivo-slider-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note"><?php echo Yii::t('global','Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-warning alert-block alert-dismissable fade in')); ?>
	<div class="col-md-6">
		<div class="form-group">
			<?php echo $form->labelEx($model,'title'); ?>
			<?php echo $form->textField($model,'title',array('size'=>30)); ?>
		</div>

		<?php if($model->isNewRecord):?>
		<div class="form-group">
			<?php echo $form->labelEx($model,'image'); ?>
			<?php echo $form->fileField($model,'image',array('size'=>30)); ?>
			<?php echo $form->error($model,'image'); ?>
		</div>
		<?php else:?>
		<div class="form-group">
			<?php echo $form->labelEx($model,'image'); ?>
			<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/slider/'.$model->image,'',array('width'=>'600px')); ?>
		</div>
		<div class="form-group">
			<label>&nbsp;</label>
			<?php echo $form->fileField($model,'image',array('size'=>30)); ?>
			<?php echo $form->error($model,'image'); ?>
		</div>
		<?php endif;?>

		<div class="form-group">
			<?php echo $form->labelEx($model,'url'); ?>
			<?php echo $form->textField($model,'url',array('size'=>60)); ?>
			<?php echo $form->error($model,'url'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'order'); ?>
			<?php echo $form->textField($model,'order',array('size'=>2)); ?>
			<?php echo $form->error($model,'order'); ?>
		</div>

		<div class="form-group">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'),array('style'=>'min-width:100px;')); ?>
		</div>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'caption'); ?>
		<?php
				$this->widget('application.extensions.wysihtml.EWysiHtml', array(
								'model'=>$model,
								'attribute'=>'caption', //Model attribute name. Nome do atributo do modelo.
								'options'=>array(
									'color'=>true,
									'html'=>true,
									'controls'=>'bold italic underline | alignleft center alignright justify | cut copy paste pastetext | numbering source',
								),
								'value'=>$model->caption,
							'htmlOptions'=>array('class'=>'form-control','rows'=>'5'),
						));
			?>
		<?php echo $form->error($model,'caption'); ?>
	</div>

<?php $this->endWidget(); ?>
