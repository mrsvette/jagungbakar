<?php
	$this->widget('zii.widgets.CMenu', array(
		'id'=>'menu-main-menu',
		'items'=>$items,
		'htmlOptions'=>array('class'=>'nav navbar-nav'),
		'submenuHtmlOptions'=>array('class'=>'dropdown-menu','role'=>'menu'),
		'activeCssClass'=>'active',
		'encodeLabel'=>false,
	));
?>
<?php
Yii::app()->clientScript->registerScript('customize', "
	$('ul.navbar-nav').find('li').addClass('dropdown');
	var menu=$('ul.dropdown-menu').parent().find('a:first');
	menu.addClass('dropdown-toggle');
	menu.attr('data-toggle','dropdown');
	menu.append('<b class=\"caret\"></b>');
");
?>
