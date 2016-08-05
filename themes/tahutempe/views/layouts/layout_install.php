<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
        
	<!-- xxx Favicons xxx -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/img/favicon.ico">
	
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/css/style.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/css/responsive.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/css/font-awesome.min.css" type="text/css">
	
	<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/js/jquery.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="body">
	<div class="main-wrap container">
		<div class="row">
			<div class="col-md-9 ts-main-left">
				<!-- HEADER -->
				<header>
					<div class="container">
						<div class="row">
							<div class="col-md-4 logo">
								<h3><?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/uploads/images/logo.png'),array('/home'));?></h3>
							</div>
							<div class="col-md-8">				
								<h2>CMS / Framework Installation Version 1.1.0</h2>
								<p>Thanks for choosing to use Jagung Bakar! Please follow the instructions below and you should be up in running in no time.</p>
							</div>
						</div>
					</div>
				</header>

				<?php echo $content; ?>

				<!-- FOOTER-COPYRIGHT -->
				<div class="container footer" data-animated="0">
					<div class="row">
						<div class="col-md-12">
							<footer>
								<div class="col-md-6">
									<p>&copy; <?php echo date("Y");?> <?php echo Yii::app()->name;?> All Rights Reserved</p>
								</div>
								<div class="col-md-6">
									<ul class="f-social">
										<li><a href="#" class="fa fa-google-plus"></a></li>
										<li><a href="#" class="fa fa-twitter"></a></li>
										<li><a href="#" class="fa fa-dribbble"></a></li>
										<li><a href="#" class="fa fa-facebook"></a></li>
									</ul>
								</div>
							</footer>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 ts-main-right">
				<div class="info-wrap">
					<div class="row">
						<div class="col-md-12" data-animated="0">
							<div id="tabwrap">
								<!-- TABS --> 
								<ul id="tabs">
									<li class="current"><a href="#1"><i class="fa fa-phone"></i></a></li>
								</ul>
								<!-- TAB CONTENT --> 
								<div id="content">
									<div id="1">
										<p><?php echo CHtml::link(CHtml::image(Yii::getFrameworkPath().'/yii-powered.png'),array('/home'));?></p>
									</div>
								</div>
								<p><?php echo CHtml::link(CHtml::image(Yii::getFrameworkPath().'/yii-powered.png'),array('/home'));?></p>
							</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/scrolltotop/arrow79.js"></script>
<noscript><a class="backtotop" href="#"></a></noscript>
</body>
</html>
