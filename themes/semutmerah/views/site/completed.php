<?php
$this->pageTitle='Installation - '.Yii::app()->name;
?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h4><b>Completed Installation</b></h4><hr/>
			<div class="col-sm-12">
				<div class="alert alert-success">
					<p>Congratulation !, your new website is successfully installed.<br/>
					Please remove "install.php" on this path <?php echo Yii::app()->request->baseUrl;?>/install.php</p>
					<p>You can manage your new website on <?php echo CHtml::link(Yii::app()->createUrl('appadmin'),array('/appadmin'));?></p>
					<p>Please use this default account to login in admin area:</p>
					<p>Username : admin<br/>
					Password : admin</p>
				</div>
			</div>
			<div class="col-sm-6">
				<?php echo CHtml::link('Go To Website',array('/home'),array('class'=>'btn btn-info'));?>
				<?php echo CHtml::link('Go To Admin Area',array('/appadmin'),array('class'=>'btn btn-success','target'=>'_newtab'));?>
			</div>
			<div class="clearfix space20"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
function setup(){
	$.ajax({
		'url': "<?php echo Yii::app()->createUrl('/site/finishedInstalation');?>",
		'dataType': 'json',
		'type':'post',
		'success': function(data) {}
	});
	return false;
}
$(function(){
	setup();
});
</script>
