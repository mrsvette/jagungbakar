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
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/tahutempe/css/style.css">
	<script async src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/tahutempe/js/core.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body class="main-header-fixed">
<div id="page-wrapper">
<div class="main-header bg-header wow fadeInDown">
    <div class="container">
    <!--<a href="index.html" class="header-logo" title="Monarch - Create perfect presentation websites"></a><!-- .header-logo -->
	<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/uploads/images/'.Yii::app()->config->get('logo')),array('/home'),array('class'=>'logo'));?>
    <div class="right-header-btn">
        <div id="mobile-navigation">
            <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target=".header-nav"><span></span></button>
        </div>
        <div class="search-btn">
            <a href="#" class="popover-button" title="Search" data-placement="bottom" data-id="#popover-search">
                <i class="glyph-icon icon-search"></i>
            </a>
            <div class="hide" id="popover-search">
                <div class="pad5A box-md">
                    <div class="input-group">
                        <input type="text" class="form-control" destination="#content-frame" placeholder="Search terms here ..." onchange="cari(this);" action="<?php echo Yii::app()->createUrl('site/search');?>">
						<span class="input-group-btn">
                            <a class="btn btn-primary btn-search" href="javascript:void(0);">Search</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .header-logo -->
	<?php $this->widget('mainMenu');?>
</div><!-- .container -->
</div><!-- .main-header -->

<?php echo $content;?>

<div class="main-footer bg-gradient-7 clearfix">
    <div class="container clearfix">
        <div class="col-md-3 pad25R">
            <div class="header">About us</div>
            <p class="about-us">
                sollicitudin eu erat. Pellentesque ornare mi vitae sem consequat ac bibendum neque adipiscing.
            </p>
            <div class="divider"></div>
            <div class="header">Footer background</div>
            <div class="theme-color-wrapper clearfix">
                <h5>Solids</h5>
                <a class="tooltip-button set-footer-style bg-primary" data-header-bg="bg-primary" title="" href="#" data-original-title="Primary">Primary</a>
                <a class="tooltip-button set-footer-style bg-green" data-header-bg="bg-green" title="" href="#" data-original-title="Green">Green</a>
                <a class="tooltip-button set-footer-style bg-red" data-header-bg="bg-red" title="" href="#" data-original-title="Red">Red</a>
                <a class="tooltip-button set-footer-style bg-blue" data-header-bg="bg-blue" title="" href="#" data-original-title="Blue">Blue</a>
                <a class="tooltip-button set-footer-style bg-warning" data-header-bg="bg-warning" title="" href="#" data-original-title="Warning">Warning</a>
                <a class="tooltip-button set-footer-style bg-purple" data-header-bg="bg-purple" title="" href="#" data-original-title="Purple">Purple</a>
                <a class="tooltip-button set-footer-style bg-black" data-header-bg="bg-black" title="" href="#" data-original-title="Black">Black</a>

                <div class="clear"></div>

                <h5 class="mrg15T">Gradients</h5>
                <a class="tooltip-button set-footer-style bg-gradient-1" data-header-bg="bg-gradient-1" title="" href="#" data-original-title="Gradient 1">Gradient 1</a>
                <a class="tooltip-button set-footer-style bg-gradient-2" data-header-bg="bg-gradient-2" title="" href="#" data-original-title="Gradient 2">Gradient 2</a>
                <a class="tooltip-button set-footer-style bg-gradient-3" data-header-bg="bg-gradient-3" title="" href="#" data-original-title="Gradient 3">Gradient 3</a>
                <a class="tooltip-button set-footer-style bg-gradient-4" data-header-bg="bg-gradient-4" title="" href="#" data-original-title="Gradient 4">Gradient 4</a>
                <a class="tooltip-button set-footer-style bg-gradient-5" data-header-bg="bg-gradient-5" title="" href="#" data-original-title="Gradient 5">Gradient 5</a>
                <a class="tooltip-button set-footer-style bg-gradient-6" data-header-bg="bg-gradient-6" title="" href="#" data-original-title="Gradient 6">Gradient 6</a>
                <a class="tooltip-button set-footer-style bg-gradient-7" data-header-bg="bg-gradient-7" title="" href="#" data-original-title="Gradient 7">Gradient 7</a>
                <a class="tooltip-button set-footer-style bg-gradient-8" data-header-bg="bg-gradient-8" title="" href="#" data-original-title="Gradient 8">Gradient 8</a>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="header">Recent posts</h3>
			<?php $this->widget('PostWidget',array('limit'=>2));?>
        </div>
        <div class="col-md-2">
            <h3 class="header">Components</h3>
            <?php
				$this->widget('zii.widgets.CMenu', array(
					'id'=>'bottom-menu',
					'items'=>array(
						array('label'=>'Static sections','url'=>array('/home')),
						array('label'=>'Hero alignments','url'=>array('/home')),
						array('label'=>'Hero overlays','url'=>array('/home')),
						array('label'=>'Video sections','url'=>array('/home')),
						array('label'=>'Portfolio 3 columns','url'=>array('/home')),
						array('label'=>'Parallax sections','url'=>array('/home')),
						array('label'=>'Contact us','url'=>array('/contact-us')),
					),
					'htmlOptions'=>array('class'=>'footer-nav'),
					'activeCssClass'=>'active',
					'encodeLabel'=>false,
				));
			?>
        </div>
        <div class="col-md-3">
            <h3 class="header">Photo Gallery</h3>
            <div class="row no-gutter">
                <div class="col-xs-4">
                    <a href="<?php echo Yii::app()->request->baseUrl.'/css/tahutempe/image-resources/stock-images/img-20.jpg';?>" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl.'/css/tahutempe/image-resources/stock-images/img-20.jpg';?>" alt="">
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="<?php echo Yii::app()->request->baseUrl.'/css/tahutempe/image-resources/stock-images/img-19.jpg';?>" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl.'/css/tahutempe/image-resources/stock-images/img-19.jpg';?>" alt="">
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="<?php echo Yii::app()->request->baseUrl.'/css/tahutempe/image-resources/stock-images/img-18.jpg';?>" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl.'/css/tahutempe/image-resources/stock-images/img-18.jpg';?>" alt="">
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="<?php echo Yii::app()->request->baseUrl.'/css/tahutempe/image-resources/stock-images/img-17.jpg';?>" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl.'/css/tahutempe/image-resources/stock-images/img-17.jpg';?>" alt="">
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="<?php echo Yii::app()->request->baseUrl.'/css/tahutempe/image-resources/stock-images/img-16.jpg';?>" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl.'/css/tahutempe/image-resources/stock-images/img-16.jpg';?>" alt="">
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="<?php echo Yii::app()->request->baseUrl.'/css/tahutempe/image-resources/stock-images/img-15.jpg';?>" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl.'/css/tahutempe/image-resources/stock-images/img-15.jpg';?>" alt="">
                    </a>
                </div>
            </div>
            <h3 class="header">Contact us</h3>
            <ul class="footer-contact">
                <li>
                    <i class="glyph-icon icon-home"></i>
                    <?php echo Yii::app()->config->get('address');?>
                </li>
                <li>
                    <i class="glyph-icon icon-phone"></i>
                    <?php echo Yii::app()->config->get('phone');?>
                </li>
                <li>
                    <i class="glyph-icon icon-envelope-o"></i>
                    <a href="#" title=""><?php echo Yii::app()->config->get('admin_email');?></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer-pane">
        <div class="container clearfix">
            <div class="logo">&copy; 2015 <?php echo Yii::app()->config->get('site_name');?>. All Rights Reserved.</div>
            <div class="footer-nav-bottom">
                <a href="#" title="Portfolio">Widgets</a>
                <a href="#" title="Layout">Layout</a>
                <a href="#" title="Elements">Elements</a>
                <a href="#" title="">Pricing tables</a>
                <a href="#" title="Portfolio">Portfolio</a>
            </div>
        </div>
    </div>
</div></div>

<script async src="<?php echo Yii::app()->request->baseUrl.'/css'; ?>/tahutempe/js/frontend.js"></script>
<?php $this->widget('ext.widgets.loading.LoadingWidget');?>
<script type="text/javascript">
	/*(function () {
		var scr = document.createElement("script");
		scr.setAttribute('async', 'true');
		scr.type = "text/javascript";
		scr.src = "<?php echo Yii::app()->request->baseUrl; ?>/css/semutmerah/js/analitik.js";
		((document.getElementsByTagName('head') || [null])[0] || document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
	}());
	window.onload = function(e){ 
		ma.create(document,"<?php echo Yii::app()->createUrl('site/tracking');?>");
		ma.send();
	}*/
</script>
</body>
</html>
