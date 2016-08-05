<div class="alert alert-success hide">
	<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
	<span id="message"></span>
</div>
<?php $form=$this->beginWidget('CActiveForm',array('id'=>'facility-form')); ?>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-warning alert-block alert-dismissable fade in')); ?>
	<?php if(count($item->facility_rel)<=0):?>
		<?php $this->renderPartial('__facility_item',array('model'=>$model));?>
	<?php else:?>
		<?php foreach($item->facility_rel as $facility):?>
		<?php $this->renderPartial('__facility_item',array('model'=>$facility));?>
		<?php endforeach;?>
	<?php endif;?>
	<div id="clone-facility"></div>

	<div class="form-group buttons">
		<?php 
			echo CHtml::ajaxSubmitButton(Yii::t('global', 'Save'),CHtml::normalizeUrl(array('products/createFacilityItems','id'=>$item->id)),array('dataType'=>'json','success'=>'js:
				function(data){
					if(data.status=="success"){
						$("form[id=\'facility-form\']").parent().find("#message").html(data.div);
						$("form[id=\'facility-form\']").parent().find(".alert-success").removeClass("hide");
						return false;
					}else{
						$("form[id=\'facility-form\']").parent().html(data.div);
					}
					return false;
				}'
			),
			array('style'=>'width:100px','class'=>'btn btn-success','id'=>uniqid()));
		?>
	</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
function addFacility(){
	$.ajax({
		'beforeSend': function() { Loading.show(); },
		'complete': function() { Loading.hide(); },
		'url': '<?php echo Yii::app()->createUrl('/'.Yii::app()->controller->module->id.'/products/addFacilityForm');?>',
		'dataType': 'json',
		'type':'post',
		'success': function(data) {
			if(data.status=='success'){
				$('#clone-facility').append(data.div);
			}
		}
	});
}
function deleteFacility(data){
	if(confirm('Anda yakin ingin mengapus item ini?')){
		var row=$(data).parent().parent();
		var name=row.find('#ProductFasilities_name').val();
		var description=row.find('#ProductFasilities_description').val();
		var product_item = '<?php echo $item->id;?>';
		$.ajax({
			'beforeSend': function() { Loading.show(); },
			'complete': function() { Loading.hide(); },
			'url': '<?php echo Yii::app()->createUrl('/'.Yii::app()->controller->module->id.'/products/deleteFacility');?>',
			'dataType': 'json',
			'type':'post',
			'data':{'product_item_id':product_item,'name':name,'description':description},
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
