<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />	
	<meta name="description" content="<?php echo $this->meta_description;?>" /> 
	<meta name="keywords" content="<?php echo $this->meta_keywords;?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
        
	<!-- xxx Favicons xxx -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/semutmerah/img/favicon.ico">
	
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/semutmerah/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/semutmerah/style.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/semutmerah/css/colors.css">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div id="wrapper">
	<div class="topbar">
    	<div class="container">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="callus">
                    <p>
                        <span><i class="fa fa-envelope-o"></i> <?php echo Yii::app()->config->get('admin_email');?></span> 
                        <span><i class="fa fa-phone"></i> <?php echo Yii::app()->config->get('phone');?></span>
                    </p>
                </div><!-- end callus -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            	<div class="marketing">
                    <ul class="topflags pull-right">
						<?php foreach(PostLanguage::model()->findAll() as $lang):?>
                        <li>
							<a data-placement="bottom" data-toggle="tooltip" data-original-title="<?php echo $lang->name;?>" title="<?php echo $lang->name;?>" href="#">
								<?php echo CHtml::image(Yii::app()->request->baseUrl.'/css/semutmerah/images/flags/'.$lang->code.'.png');?>
							</a>
						</li>
                        <?php endforeach;?>
                    </ul><!-- end flags -->
                    <ul class="topmenu pull-right">
                        <li><a href="login.html"><i class="fa fa-lock"></i> Login / Register</a></li>
                    </ul><!-- topmenu -->
                    <div id="dmsearch" class="dmsearch">
                        <div class="dm-search-container">
                            <?php $this->widget('SearchWidget',array('class_name'=>'dmsearch-input','placeholder'=>'Search on this site..'));?>
                        </div>
                        <input id="go" class="dmsearch-submit" type="submit" value="">
                        <span class="searchicon"></span>
                    </div><!-- end search -->
                </div><!-- end marketing -->
            </div><!-- end col-lg-6 -->
        </div><!-- end container -->
    </div><!-- end topbar -->

	<header class="header-wrapper">
    	<div class="container">
        	<div class="site-header clearfix">
                <div class="col-lg-3 col-md-3 col-sm-12 title-area pull-left">
                    <div class="site-title" id="title">
                        <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/uploads/images/'.Yii::app()->config->get('logo')),array('/home'));?>
                    </div><!-- site title -->
                </div><!-- title area -->
                <div class="col-lg-9 col-md-9 col-sm-12">
                      <nav class="navbar navbar-default fhmm" role="navigation">
                        <div class="navbar-header">
                            <button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        </div><!-- end navbar-header -->
                        <div id="defaultmenu" class="navbar-collapse collapse container">
                            <?php $this->widget('mainMenu');?>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo Yii::app()->createUrl('/peta-situs');?>"><i class="fa fa-sitemap"></i> <?php echo Yii::t('page','Site Map');?></a></li>
                            </ul><!-- end nav navbar-nav navbar-right -->
                        </div><!-- end #navbar-collapse-1 -->
					</nav><!-- end navbar navbar-default fhmm -->   
              	</div><!-- end col 9 --> 
			</div><!-- end site header -->
    	</div><!-- end container -->         
	</header><!-- end header-wrapper -->

	<?php echo $content; ?>

	<footer class="section-footer dm-shadow">
    	<div class="container">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget clearfix">
                        <img class="footerlogo" src="images/footerlogo.png" alt=""><br>
                        <p>Er zijn vele variaties van passages van Lorem Ipsum beschikbaar maar het merendeel heeft te lijden gehad van wijzigingen in een of andere vorm, door ingevoegde humor of willekeu seloofwaardig ogen.</p>
                        <a href="#" class="btn btn-primary"><i class="fa fa-info"></i> read more</a>
                    </div><!-- end widget -->
                </div><!-- end col 3 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget clearfix">
                        <div class="widget-title"><h3>Popular Tags</h3><hr></div>
                        <div class="tagcloud">
                            <a href="#" class="" title="12 topics">advice</a>
                            <a href="#" class="" title="2 topics">wordpress</a>
                            <a href="#" class="" title="21 topics">joomla</a>
                            <a href="#" class="" title="5 topics">blog</a>
                            <a href="#" class="" title="62 topics">cms</a>
                            <a href="#" class="" title="12 topics">drupal</a>
                            <a href="#" class="" title="88 topics">html5</a>
                            <a href="#" class="" title="15 topics">css3</a>
                            <a href="#" class="" title="31 topics">orange</a>
                            <a href="#" class="" title="16 topics">love to</a>
                            <a href="#" class="" title="32 topics">tutorials</a>
                            <a href="#" class="" title="12 topics">how to</a>
                            <a href="#" class="" title="44 topics">advice</a>
                        </div>
                    </div><!-- end widget -->
                </div><!-- end col 3 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget clearfix">
                        <div class="widget-title"><h3>Last Tweets</h3><hr></div>
						<ul class="twitter-widget">
                            <li><a href="#">@envato</a> - Lorem ipsum dolor sit amet, consectetur adipisicing elit?
                                <small><a href="#">23, June 2013</a></small>
                            </li>
                            <li><a href="#">@mediadesigning</a> - Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.. <a href="http://goo.gl/eErfGa">http://goo.gl/eErfGa</a>
                                <small><a href="#">16, June 2013</a></small>
                            </li>
						</ul>
                    </div><!-- end widget -->
                </div><!-- end col 3 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="widget-title"><h3>Flickr Stream</h3><hr></div>
						<ul class="gallery flickr-gallery" data-flickr-id="52617155@N08">
							<!-- Auto filled with the Flickr Feed Plugin -->
						</ul>
                    </div><!-- end widget -->
                </div><!-- end col 3 -->
        </div><!-- end container -->
    </footer><!-- end section-footer -->
	<section class="section-copyright dm-shadow text-center">
		<div class="container">
            <div class="back-to-top clearfix">
                <span><span class="dmtop"><i class="fa fa-arrow-up"></i></span></span>
            </div>
			<p>Copyright © <?php echo date('Y');?> <a href="<?php echo Yii::app()->createUrl('/home');?>"><?php echo Yii::app()->config->get('site_name');?></a>. All Rights Reserved.</p>
		</div><!-- end container -->
    </section><!-- end section-copyright -->
</div>
<script async src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/semutmerah/js/bootstrap.js"></script>
<script async src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/semutmerah/js/fhmm.js"></script>
<script async src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/semutmerah/js/jquery.unveilEffects.js"></script>	
<script src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/semutmerah/js/application.js" id="app-js"></script>
<?php $this->widget('ext.widgets.loading.LoadingWidget');?>
<script type="text/javascript">
	(function () {
		var scr = document.createElement("script");
		scr.setAttribute('async', 'true');
		scr.type = "text/javascript";
		scr.src = "<?php echo Yii::app()->request->baseUrl; ?>/css/semutmerah/js/analitik.js";
		((document.getElementsByTagName('head') || [null])[0] || document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
	}());
	window.onload = function(e){ 
		ma.create(document,"<?php echo Yii::app()->createUrl('site/tracking');?>");
		ma.send();
	}
	</script>
</body>
</html>
