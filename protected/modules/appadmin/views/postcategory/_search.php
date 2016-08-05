<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_name'); ?>
		<?php echo $form->textField($model,'category_name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parent_id'); ?>
		<?php echo $form->dropDownList($model,'parent_id',PostCategory::listItems()); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('global','Search'),array('style'=>'min-width:100px;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
