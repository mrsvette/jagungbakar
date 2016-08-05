<div class="alert alert-success hide">
	<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
	<span id="message"></span>
</div>
<?php $form=$this->beginWidget('CActiveForm',array('id'=>'sub-item-form')); ?>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-warning alert-block alert-dismissable fade in')); ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>80,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<?php echo $form->hiddenField($model,'product_id',array('value'=>$product_item->product_id));?>
	<?php echo $form->hiddenField($model,'parent_id',array('value'=>$product_item->id));?>
	<div class="form-group">
			<?php echo $form->labelEx($model,'description'); ?>
			<?php
				$this->widget('application.extensions.wysihtml.EWysiHtml', array(
								'model'=>$model,
								'attribute'=>'description', //Model attribute name. Nome do atributo do modelo.
								'options'=>array(
									'color'=>true,
									'html'=>true,
									'controls'=>'bold italic underline | alignleft center alignright justify | cut copy paste pastetext | numbering image source',
								),
								'value'=>$model->description,
							'htmlOptions'=>array('class'=>'form-control','rows'=>'5'),
						));
			?>
			<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="form-group buttons">
		<?php 
		echo CHtml::ajaxSubmitButton(Yii::t('global', 'Save'),CHtml::normalizeUrl(array('products/createItems')),array('dataType'=>'json','success'=>'js:
				function(data){
					if(data.status=="success"){
						$("form[id=\'sub-item-form\']").parent().find("#message").html(data.div);
						$("form[id=\'sub-item-form\']").parent().find(".alert-success").removeClass("hide");
						$.fn.yiiGridView.update("sub-item-grid-view", {
							data: $(this).serialize()
						});
						return false;
					}else{
						$("form[id=\'sub-item-form\']").parent().html(data.div);
					}
					return false;
				}'
			),
			array('style'=>'width:100px','class'=>'btn btn-success','id'=>uniqid()));
		?>
	</div>

<?php $this->endWidget(); ?>
