<?php
	$this->widget('zii.widgets.CMenu', array(
		'items'=>array(
			array('label'=>'<i class="fa fa-home"></i> <span>Dashboard</span>', 'url'=>array('default/'),'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'<i class="fa fa-rss"></i> <span>'.Yii::t('menu','Post').'</span>', 'url'=>'#', 
				'items'=>array(
					array('label'=>'<i class="fa fa-caret-right"></i>'.Yii::t('menu','All Post'),'url'=>array('posts/admin')),
					array('label'=>'<i class="fa fa-caret-right"></i>'.Yii::t('menu','Add New'),'url'=>array('posts/create')),
					array('label'=>'<i class="fa fa-caret-right"></i>'.Yii::t('menu','Categories'),'url'=>array('postcategory/create')),
					array('label'=>'<i class="fa fa-caret-right"></i>'.Yii::t('menu','Comments'),'url'=>array('comments/view')),
				),'itemOptions'=>array('class'=>'nav-parent'),'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'<i class="fa fa-file-text"></i> <span>'.Yii::t('menu','Pages').'</span><b class="arrow icon-angle-down"></b>', 'url'=>'#', 
				'items'=>array(
					array('label'=>'<i class="fa fa-caret-right"></i>'.Yii::t('menu','All Pages'),'url'=>array('pages/admin')),
					array('label'=>'<i class="fa fa-caret-right"></i>'.Yii::t('menu','Add New'),'url'=>array('pages/create')),
				),'itemOptions'=>array('class'=>'nav-parent'),'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'<i class="fa fa-desktop"></i> <span>'.Yii::t('menu','Appearance').'</span><b class="arrow icon-angle-down"></b>', 'url'=>'#', 
				'items'=>array(
					array('label'=>'<i class="fa fa-caret-right"></i> Menu','url'=>array('menu/view')),
					array('label'=>'<i class="fa fa-caret-right"></i> Slide Show','url'=>array('nivoslider/view')),
					array('label'=>'<i class="fa fa-caret-right"></i> Banner','url'=>array('banners/view')),
				),'itemOptions'=>array('class'=>'nav-parent'),'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'<i class="fa fa-wrench"></i> <span>'.Yii::t('menu','Manage').'</span><b class="arrow icon-angle-down"></b>', 'url'=>'#', 
				'items'=>array(
					array('label'=>'<i class="fa fa-caret-right"></i> Users', 'url'=>array('users/view')),
					array('label'=>'<i class="fa fa-caret-right"></i> Parameter', 'url'=>array('params/view')),
					array('label'=>'<i class="fa fa-caret-right"></i> Email Template', 'url'=>array('emails/view')),
				),'itemOptions'=>array('class'=>'nav-parent'),'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'<i class="fa fa-bar-chart-o"></i> <span>'.Yii::t('menu','Analytics').'</span><b class="arrow icon-angle-down"></b>', 'url'=>'#', 
				'items'=>array(
					array('label'=>'<i class="fa fa-caret-right"></i> Realtime', 'url'=>array('analytics/realtime')),
					array('label'=>'<i class="fa fa-caret-right"></i> Audience', 'url'=>array('analytics/audiences')),
					//array('label'=>'<i class="fa fa-caret-right"></i> Acquisition', 'url'=>array('analytics/audiences')),
				),'itemOptions'=>array('class'=>'nav-parent'),'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'<i class="fa fa-suitcase"></i> <span>'.Yii::t('menu','Product').'</span><b class="arrow icon-angle-down"></b>', 'url'=>'#', 
				'items'=>array(
					array('label'=>'<i class="fa fa-caret-right"></i> Overview', 'url'=>array('products/admin')),
				),'itemOptions'=>array('class'=>'nav-parent'),'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'<i class="glyphicon glyphicon-picture"></i> <span>'.Yii::t('menu','Galleries').'</span><b class="arrow icon-angle-down"></b>', 'url'=>'#', 
				'items'=>array(
					array('label'=>'<i class="fa fa-caret-right"></i>'.Yii::t('menu','Overview'),'url'=>array('galleries/view')),
					array('label'=>'<i class="fa fa-caret-right"></i>'.Yii::t('menu','Add New'),'url'=>array('galleries/create')),
				),'itemOptions'=>array('class'=>'nav-parent'),'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'<i class="fa fa-unlock-alt"></i> <span>Login</span>', 'url'=>array('default/login'), 'visible'=>Yii::app()->user->isGuest),
		),
		'htmlOptions'=>array('class'=>'nav nav-pills nav-stacked nav-bracket'),
		'encodeLabel'=>false,
		'submenuHtmlOptions'=>array('class'=>'children')
	));
?>
