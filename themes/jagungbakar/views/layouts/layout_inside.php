<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />	
	<meta name="description" content="<?php echo $this->meta_description;?>" /> 
	<meta name="keywords" content="<?php echo $this->meta_keywords;?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
        
	<!-- xxx Favicons xxx -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/img/favicon.ico">
	
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/js/vendor/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/js/vendor/owl-carousel/owl.theme.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/js/vendor/owl-carousel/owl.transitions.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/js/vendor/easytabs/easy-responsive-tabs.css"/>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/css/prettyphoto.css"/>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/js/vendor/calendar/clndr.css"/>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/css/animate.css" >
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/css/style.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/css/responsive.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/css/font-awesome.min.css" type="text/css">
	
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
							<div class="col-md-6 logo">
								<h3><?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/uploads/images/'.Yii::app()->config->get('logo')),array('/home'));?></h3>
							</div>
							<div class="col-md-6 text-right">
								<a href="<?php echo Yii::app()->createUrl('/peta-situs');?>"><span class="fa fa-sitemap"></span> <?php echo Yii::t('page','Site Map');?></a>
							</div>
						</div>
					</div>
				</header>

				<!-- NAVIGATION -->
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php $this->widget('mainMenu');?>
						</div>
					</div>
				</div>

				<?php echo $content; ?>

				<!-- FOOTER-COPYRIGHT -->
				<div class="container footer">
					<div class="row">
						<div class="col-md-12">
							<footer>
								<div class="col-md-6">
									<p>&copy; <?php echo date("Y");?> <?php echo Yii::app()->config->get('site_name');?> All Rights Reserved</p>
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
						<div class="col-md-12">
							<div id="tabwrap">
								<!-- TABS --> 
								<ul id="tabs">
									<li class="current"><a href="#1"><i class="fa fa-phone"></i></a></li>
									<li><a href="#2"><i class="fa fa-envelope"></i></a></li>
									<li><a href="#3"><i class="fa fa-search"></i></a></li>
								</ul>
								<!-- TAB CONTENT --> 
								<div id="content">
								<div id="1" class="current">
									<p> <i class="fa fa-phone"></i> call us at: <?php echo Yii::app()->config->get('phone');?></p>
								</div>
								<div id="2">
									<p> <i class="fa fa-envelope"></i> <?php echo Yii::app()->config->get('admin_email');?></p>
								</div>
								<div id="3">
									<span class="fa fa-search fa-2x"></span> 
									<?php $this->widget('SearchWidget',array('placeholder'=>'Search Site'));?>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
				
			<div class="hb-info animated-in" data-animated="0">
				<div class="hb-inner">
					<?php foreach(Post::getLatestPost(1) as $ipost=>$dpost):?>
					<?php $post=Post::model()->findByPk($dpost['id']);?>
					<div class="hb-meta">
						<i class="fa fa-comments"></i>
						<span><?php echo $post->commentCount;?> comments</span>
					</div>
					<h4>
					<?php echo $dpost['title'];?>
					</h4>
					<div class="sep"></div>
					<p><?php echo $post->parseContent2(20,false);?></p>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
</div>
	<script async src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/js/bootstrap.min.js"></script>
	<script async src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/js/vendor/owl-carousel/owl.carousel.js"></script>
	<script async src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/js/jflickrfeed.min.js"></script>
	<script async src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/js/jquery.nicescroll.js"></script>
	<script async type="text/javascript" src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/scrolltotop/arrow79.js"></script>
	<noscript><a class="backtotop" href="#"></a></noscript>
	<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/jagungbakar/js/main.js"></script>
	<?php $this->widget('ext.widgets.loading.LoadingWidget');?>
	<script type="text/javascript">
	(function () {
		var scr = document.createElement("script");
		scr.setAttribute('async', 'true');
		scr.type = "text/javascript";
		scr.src = "<?php echo Yii::app()->request->baseUrl; ?>/css/jagungbakar/js/analitik.js";
		((document.getElementsByTagName('head') || [null])[0] || document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
	}());
	window.onload = function(e){ 
		ma.create(document,"<?php echo Yii::app()->createUrl('site/tracking');?>");
		ma.send();
	}
	</script>
</body>
</html>
