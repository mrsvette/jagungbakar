<?php $this->beginContent('/layouts/layout_inside'); ?>
<div class="hero-box hero-box-smaller full-bg-13 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
    <div class="container">
        <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s"><?php echo Yii::t('menu','Contact Us');?></h1>
    </div>
    <div class="hero-overlay bg-black"></div>
</div>
<div class="large-padding pad25B">
    <div class="container pad25B row">
        <div class="col-md-8" id="content-frame">
            <?php $this->widget('ContactWidget');?>
        </div>
        <div class="col-md-4">
			<h3>Leave Your Message</h3>
            <div class="divider mrg15T mrg15B"></div>
            <ul class="contact-list mrg15T mrg25B reset-ul">
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
                    <a href="mailto:<?php echo Yii::app()->config->get('admin_email');?>" title=""><?php echo Yii::app()->config->get('admin_email');?></a>
                </li>
            </ul>
		</div>
    </div>
</div>
<?php $this->endContent(); ?>
