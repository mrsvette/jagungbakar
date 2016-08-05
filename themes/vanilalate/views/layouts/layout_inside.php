<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<html lang="en">

<head>
  	<meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="description" content="<?php echo $this->meta_description;?>" /> 
	<meta name="keywords" content="<?php echo $this->meta_keywords;?>" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!-- Favicons-->
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/semutmerah/img/favicon.ico">
    
    <!-- CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl.'/css/'.Yii::app()->theme->name; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl.'/css/'.Yii::app()->theme->name; ?>/css/superfish.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl.'/css/'.Yii::app()->theme->name; ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl.'/css/'.Yii::app()->theme->name; ?>/fontello/css/fontello.css" rel="stylesheet">
       
    <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<header>
	  	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/uploads/images/'.Yii::app()->config->get('logo'),'',array('style'=>'height:40px;')),array('/home'));?>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<div class=" pull-right"><a href="login.html" class="button_top" id="login_top">Sign in</a> <a href="apply_2.html" class="button_top hidden-xs" id="apply">Apply now</a></div>
		        <ul id="top_nav" class="hidden-xs">
		            <li><a href="about_us.html">About</a></li>
		            <li><a href="apply.html">Wizard Apply</a></li>
		            <li><a href="register.html">Register</a></li>
		        </ul>
			</div>
		</div>
		</div>
	</header><!-- End header -->
	<nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="mobnav-btn"></div>
				<?php $this->widget('mainMenu');?>
		        <div class="col-md-3 pull-right hidden-sm hidden-xs">
		                <div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"></span>
							</form>
						</div>
		          </div><!-- End search -->
			</div>
		</div><!-- End row -->
	</div><!-- End container -->
	</nav>
	<?php echo $content; ?>

<footer>
<div class="container" id="nav-footer">
	<div class="row text-left">
		<div class="col-md-3 col-sm-3">
			<h4>Browse</h4>
			<ul>
				<li><a href="prices_plans.html">Prices</a></li>
				<li><a href="courses_grid.html">Courses</a></li>
				<li><a href="blog.html">Blog</a></li>
				<li><a href="contacts.html">Contacts</a></li>
			</ul>
		</div><!-- End col-md-4 -->
		<div class="col-md-3 col-sm-3">
			<h4>Next Courses</h4>
			<ul>
				<li><a href="course_details_1.html">Biology</a></li>
				<li><a href="course_details_2.html">Management</a></li>
				<li><a href="course_details_2.html">History</a></li>
				<li><a href="course_details_3.html">Litterature</a></li>
			</ul>
		</div><!-- End col-md-4 -->
		<div class="col-md-3 col-sm-3">
			<h4>About Learn</h4>
			<ul>
				<li><a href="about_us.html">About Us</a></li>
				<li><a href="apply_2.html">Apply</a></li>
				<li><a href="#">Terms and conditions</a></li>
				<li><a href="register.html">Register</a></li>
			</ul>
		</div><!-- End col-md-4 -->
		<div class="col-md-3 col-sm-3">
			<ul id="follow_us">
				<li><a href="#"><i class="icon-facebook"></i></a></li>
				<li><a href="#"><i class="icon-twitter"></i></a></li>
				<li><a href="#"><i class=" icon-google"></i></a></li>
			</ul>
			<ul>
				<li><strong class="phone"><?php echo Yii::app()->config->get('phone');?></strong><br><small>Mon - Fri / 9.00AM - 06.00PM</small></li>
				<li>Questions? <a href="#"><?php echo Yii::app()->config->get('admin_email');?></a></li>
			</ul>
		</div><!-- End col-md-4 -->
	</div><!-- End row -->
</div>
<div id="copy_right">© 1998-2014</div>
</footer>

<div id="toTop">Back to top</div>

<!-- OTHER JS --> 
<script async src="<?php echo Yii::app()->request->baseUrl.'/css/'.Yii::app()->theme->name; ?>/js/superfish.js"></script>
<script async src="<?php echo Yii::app()->request->baseUrl.'/css/'.Yii::app()->theme->name; ?>/js/bootstrap.min.js"></script>
<script async src="<?php echo Yii::app()->request->baseUrl.'/css/'.Yii::app()->theme->name; ?>/js/retina.min.js"></script>
<script async src="<?php echo Yii::app()->request->baseUrl.'/css/'.Yii::app()->theme->name; ?>/js/jquery.placeholder.js"></script>
<script async src="<?php echo Yii::app()->request->baseUrl.'/css/'.Yii::app()->theme->name; ?>/js/functions.js"></script>
<script async src="<?php echo Yii::app()->request->baseUrl.'/css/'.Yii::app()->theme->name; ?>/js/classie.js"></script>
<script async src="<?php echo Yii::app()->request->baseUrl.'/css/'.Yii::app()->theme->name; ?>/js/uisearch.js"></script>
<?php $this->widget('ext.widgets.loading.LoadingWidget');?>

</body>
</html>
