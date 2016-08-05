<div class="alert alert-success hide">
	<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
	<span id="message"></span>
</div>
<?php $form=$this->beginWidget('CActiveForm',array('id'=>'item-form')); ?>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-warning alert-block alert-dismissable fade in')); ?>
	<?php if(count($item->price_rel)<=0):?>
		<?php $this->renderPartial('__price_item',array('model'=>$model));?>
	<?php else:?>
		<?php foreach($item->price_rel as $price):?>
		<?php $this->renderPartial('__price_item',array('model'=>$price));?>
		<?php endforeach;?>
	<?php endif;?>
	<div id="clone"></div>

	<div class="form-group buttons">
		<?php 
			echo CHtml::ajaxSubmitButton(Yii::t('global', 'Save'),CHtml::normalizeUrl(array('products/createPriceItems','id'=>$item->id)),array('dataType'=>'json','success'=>'js:
				function(data){
					if(data.status=="success"){
						$("form[id=\'item-form\']").parent().find("#message").html(data.div);
						$("form[id=\'item-form\']").parent().find(".alert-success").removeClass("hide");
						return false;
					}else{
						$("form[id=\'item-form\']").parent().html(data.div);
					}
					return false;
				}'
			),
			array('style'=>'width:100px','class'=>'btn btn-success','id'=>uniqid()));
		?>
	</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
function addPrice(){
	$.ajax({
		'beforeSend': function() { Loading.show(); },
		'complete': function() { Loading.hide(); },
		'url': '<?php echo Yii::app()->createUrl('/'.Yii::app()->controller->module->id.'/products/addPriceForm');?>',
		'dataType': 'json',
		'type':'post',
		'success': function(data) {
			if(data.status=='success'){
				$('#clone').append(data.div);
			}
		}
	});
}
function deletePrice(data){
	if(confirm('Anda yakin ingin mengapus item ini?')){
		var row=$(data).parent().parent();
		var name=row.find('#ProductPrices_name').val();
		var period=row.find('#ProductPrices_period').val();
		var price=row.find('#ProductPrices_price').val();
		var product_item = '<?php echo $item->id;?>';
		$.ajax({
			'beforeSend': function() { Loading.show(); },
			'complete': function() { Loading.hide(); },
			'url': '<?php echo Yii::app()->createUrl('/'.Yii::app()->controller->module->id.'/products/deletePrice');?>',
			'dataType': 'json',
			'type':'post',
			'data':{'product_item_id':product_item,'name':name,'period':period,'price':price},
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
