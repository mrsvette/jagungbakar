<div class="form wide">
	<?php $form=$this->beginWidget('CActiveForm'); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'search_for'); ?>
		<?php echo $form->textField($model,'search_for'); ?>
		<?php echo CHtml::submitButton('Search'); ?>
	</div>
	<?php $this->endWidget(); ?>
</div>
<?php if(!empty($dataProvider)):?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_search',
	'template'=>"{items}\n{pager}",
)); ?>
<?php endif;?>