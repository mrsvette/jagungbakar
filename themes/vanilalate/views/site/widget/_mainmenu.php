<?php
	$this->widget('zii.widgets.CMenu', array(
		'id'=>'menu-main-menu',
		'items'=>$items,
		'htmlOptions'=>array('class'=>'sf-menu'),
		'activeCssClass'=>'active',
		'encodeLabel'=>false,
	));
?>
<?php
Yii::app()->clientScript->registerScript('customize', "
	$('ul.sf-menu').find('ul').parent().addClass('normal_drop_down');
");
?>
