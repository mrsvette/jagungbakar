<nav id="nav_menu">
<?php
	$this->widget('zii.widgets.CMenu', array(
		'id'=>'menu-main-menu',
		'items'=>$items,
		'submenuHtmlOptions'=>array('class'=>'dropdown','role'=>'menu'),
		'activeCssClass'=>'active',
		'encodeLabel'=>false,
	));
?>
</nav>
