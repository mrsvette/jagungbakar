<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/css/style.default.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/css/prettyPhoto.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/css/jquery.datatables.css" />	

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl.'/uploads/images/'.Yii::app()->config->get('favicon'); ?>">
	
	<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/js/jquery-1.10.2.min.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body class="stickyheader">
<!-- Preloader -->
<div id="preloader">
    <div id="status"><?php echo CHtml::image(Yii::app()->request->baseUrl.'/css/bracket/images/loaders/loader31.gif');?></div>
</div>
<section>
	<div class="leftpanel sticky-leftpanel">
		<div class="leftpanelinner">
			<!-- This is only visible to small devices -->
			<?php if(!Yii::app()->user->isGuest):?>
		    <div class="visible-xs hidden-sm hidden-md hidden-lg">   
		        <div class="media userlogged">
		            <div class="media-body">
		                <h4><?php echo Yii::app()->user->name;?></h4>
		                <span>"Life is so..."</span>
		            </div>
		        </div>
		      
		        <h5 class="sidebartitle actitle">Account</h5>
				<?php
					$this->widget('zii.widgets.CMenu', array(
						'items'=>array(
							array('label'=>'<i class="glyphicon glyphicon-cog"></i> '.Yii::t('menu','Change Password'), 'url'=>array('/appadmin/profile/changePassword')),
							array('label'=>'<i class="glyphicon glyphicon-log-out"></i> LogOut', 'url'=>array('/appadmin/default/logout')),
						),	
						'htmlOptions'=>array('class'=>'dropdown-menu dropdown-menu-usermenu pull-right'),
						'encodeLabel'=>false,
					));
				?>
		    </div>
		  	<?php endif;?>
		  	<h5 class="sidebartitle">Navigation</h5>
			<?php $this->widget('adminMainMenu');?>
			
			<?php $this->widget('trafficWidget');?>
    	</div><!-- leftpanelinner -->
	</div><!-- leftpanel -->

	<div class="mainpanel">
    	<div class="headerbar">
      		<a class="menutoggle menu-collapsed"><i class="fa fa-bars"></i></a>
			<?php if(!Yii::app()->user->isGuest):?>
			<div class="header-right">
		    	<ul class="headermenu">
		      		<li>
		        		<div class="btn-group">
		          			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		            			<i class="glyphicon glyphicon-user"></i> <?php echo (!Yii::app()->user->isGuest)? strtolower(Yii::app()->user->name) : '';?>
		            		<span class="caret"></span>
							</button>
		          			<?php
							$this->widget('zii.widgets.CMenu', array(
								'items'=>array(
									array('label'=>'<i class="glyphicon glyphicon-cog"></i> '.Yii::t('menu','Change Password'), 'url'=>array('/appadmin/profile/changePassword')),
									array('label'=>'<i class="glyphicon glyphicon-log-out"></i> LogOut', 'url'=>array('/appadmin/default/logout')),
								),
								'htmlOptions'=>array('class'=>'dropdown-menu dropdown-menu-usermenu pull-right'),
								'encodeLabel'=>false,
							));
							?>
		        		</div>
		      		</li>
				</ul>
      		</div><!-- header-right -->
			<?php endif;?>
		</div><!-- headerbar -->
		<div class="contentpanel">
			<div class="row">
				<?php echo $content; ?>
			</div>
		</div><!-- contentpanel-->
	</div><!-- mainpanel -->
	<div class="rightpanel">
    	
	</div><!-- rightpanel -->
</section>
<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/js/modernizr.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/js/toggles.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/js/retina.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/js/jquery.cookies.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/js/jquery.prettyPhoto.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/js/morris.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/js/raphael-2.1.0.min.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/js/jquery.datatables.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/js/chosen.jquery.min.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/bracket/js/custom.js"></script>
<?php $this->widget('ext.widgets.loading.LoadingWidget');?>
</body>
