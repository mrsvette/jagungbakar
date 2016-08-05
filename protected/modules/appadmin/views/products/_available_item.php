<div class="alert alert-success hide">
	<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
	<span id="message"></span>
</div>
<?php $form=$this->beginWidget('CActiveForm',array('id'=>'available-form')); ?>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-warning alert-block alert-dismissable fade in')); ?>
	<?php if(count($item->available_rel)<=0):?>
		<?php $this->renderPartial('__available_item',array('model'=>$model));?>
	<?php else:?>
		<?php foreach($item->available_rel as $available):?>
		<?php $this->renderPartial('__available_item',array('model'=>$available));?>
		<?php endforeach;?>
	<?php endif;?>
	<div id="clone-available"></div>

	<div class="form-group buttons">
		<?php 
			echo CHtml::ajaxSubmitButton(Yii::t('global', 'Save'),CHtml::normalizeUrl(array('products/createAvailableItems','id'=>$item->id)),array('dataType'=>'json','success'=>'js:
				function(data){
					if(data.status=="success"){
						$("form[id=\'available-form\']").parent().find("#message").html(data.div);
						$("form[id=\'available-form\']").parent().find(".alert-success").removeClass("hide");
						return false;
					}else{
						$("form[id=\'available-form\']").parent().html(data.div);
					}
					return false;
				}'
			),
			array('style'=>'width:100px','class'=>'btn btn-success','id'=>uniqid()));
		?>
	</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
function addAvailable(){
	$.ajax({
		'beforeSend': function() { Loading.show(); },
		'complete': function() { Loading.hide(); },
		'url': '<?php echo Yii::app()->createUrl('/'.Yii::app()->controller->module->id.'/products/addAvailableForm');?>',
		'dataType': 'json',
		'type':'post',
		'success': function(data) {
			if(data.status=='success'){
				$('#clone-available').append(data.div);
			}
		}
	});
}
function deleteAvailable(data){
	if(confirm('Anda yakin ingin mengapus item ini?')){
		var row=$(data).parent().parent();
		var name=row.find('#ProductAvailability_name').val();
		var description=row.find('#ProductAvailability_description').val();
		var status=row.find('#ProductAvailability_status').val();
		var product_item = '<?php echo $item->id;?>';
		$.ajax({
			'beforeSend': function() { Loading.show(); },
			'complete': function() { Loading.hide(); },
			'url': '<?php echo Yii::app()->createUrl('/'.Yii::app()->controller->module->id.'/products/deleteAvailable');?>',
			'dataType': 'json',
			'type':'post',
			'data':{'product_item_id':product_item,'name':name,'description':description,'status':status},
			'success': function(data) {
				if(data.status=='success'){
					row.empty();
				}
			}
		});
	}
	return false;
}
</script>
