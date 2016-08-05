<?php
	$this->widget('zii.widgets.CMenu', array(
		'id'=>'menu-main-menu',
		'items'=>$items,
		'htmlOptions'=>array('class'=>'header-nav collapse'),
		'submenuHtmlOptions'=>array('class'=>'dropdown','role'=>'menu'),
		'activeCssClass'=>'active',
		'encodeLabel'=>false,
	));
?>
<?php
Yii::app()->clientScript->registerScript('customize', "
	var menu=$('ul.dropdown').parent().find('a:first');
	menu.append('<i class=\"glyph-icon icon-angle-down\"></i>');
");
?>
