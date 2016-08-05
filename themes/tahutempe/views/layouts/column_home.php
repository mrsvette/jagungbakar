<?php $this->beginContent('/layouts/layout_default'); ?>
<?php $this->widget('ext.owlslider.OwlSlider',array('imageList'=>NivoSlider::flexSlider()));?>
<div class="large-padding pad25B">
    <div class="container pad25B row" id="content-frame">
        <div class="col-md-4">
            <div class="icon-box icon-box-offset-large bg-default content-box icon-boxed">
                <i class="icon-large glyph-icon bg-white border-default btn-border icon-linecons-clock wow bounceInDown" data-wow-delay="1s"></i>
                <h3 class="text-transform-upr icon-title wow fadeInUp">Easy to customize</h3>
                <p class="icon-content wow fadeInUp">Our UI kit comes packed with over 130 components including Bootstrap, jQuery widgets, charts, HTML elements and others.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box icon-box-offset-large bg-default content-box icon-boxed">
                <i class="icon-large glyph-icon bg-white border-default btn-border icon-linecons-beaker wow bounceInDown" data-wow-delay="1.5s"></i>
                <h3 class="text-transform-upr icon-title wow fadeInUp">Based on Bootstrap 3.3</h3>
                <p class="icon-content wow fadeInUp">Easily create your own or choose the right layout, color and theme for each project you develop with the AgileUI Framework.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box icon-box-offset-large bg-default content-box icon-boxed">
                <i class="icon-large glyph-icon bg-white border-default btn-border icon-linecons-camera wow bounceInDown" data-wow-delay="2s"></i>
                <h3 class="text-transform-upr icon-title wow fadeInUp">Extensive documentation</h3>
                <p class="icon-content wow fadeInUp">AUI has a comprehensive support section featuring guides and documentations has a comprehensive support section.</p>
            </div>
        </div>
    </div>
</div>

<div class="hero-box fixed-bg hero-box-smaller full-bg-10 font-inverse">
    <div class="container">
        <div class="col-md-6">
            <div class="icon-box icon-box-left mrg25B">
                <i class="icon-alt glyph-icon icon-linecons-params wow bounceIn" data-wow-duration="0.8s"></i>
                <div class="icon-wrapper">
                    <h4 class="icon-title wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.1s">Easy to customize</h4>
                    <p class="icon-content wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.2s">Our UI kit comes packed with over 130 components including Bootstrap, jQuery widgets, charts, HTML elements and others.</p>
                    <a class="read-more wow fadeInUp" data-wow-delay="1.2s" href="#" title="Learn more about customizing AUI">Learn more</a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="icon-box icon-box-left mrg25T">
                <i class="icon-alt glyph-icon icon-linecons-beaker wow bounceIn" data-wow-duration="0.8s" data-wow-delay="0.3s"></i>
                <div class="icon-wrapper">
                    <h4 class="icon-title wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.4s">Based on Bootstrap 3.3</h4>
                    <p class="icon-content wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.5s">Easily create your own or choose the right layout, color and theme for each project you develop with the AgileUI Framework.</p>
                    <a class="read-more wow fadeInUp" data-wow-delay="1.4s" href="#" title="Learn more about AUI widgets & plugins">Learn more</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="icon-box icon-box-left mrg25B">
                <i class="icon-alt glyph-icon icon-linecons-mobile wow bounceIn" data-wow-duration="0.8s" data-wow-delay="0.6s"></i>
                <div class="icon-wrapper">
                    <h4 class="icon-title wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.7s">Responsive &amp; Mobile Layouts</h4>
                    <p class="icon-content wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.8s">AUI and its themes were designed using the latest responsive design techniques themes were designed using the latest.</p>
                    <a class="read-more wow fadeInUp" data-wow-delay="1.6s" href="#" title="Learn more about AUI responsive design techiques">Learn more</a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="icon-box icon-box-left mrg25T">
                <i class="icon-alt glyph-icon icon-linecons-graduation-cap wow bounceIn" data-wow-duration="0.8s" data-wow-delay="0.9s"></i>
                <div class="icon-wrapper">
                    <h4 class="icon-title wow bounceIn" data-wow-duration="0.6s" data-wow-delay="1s">Extensive documentation</h4>
                    <p class="icon-content wow bounceIn" data-wow-duration="0.6s" data-wow-delay="1.1s">AUI has a comprehensive support section featuring guides and documentations has a comprehensive support section.</p>
                    <a class="read-more wow fadeInUp" data-wow-delay="1.8s" href="#" title="Learn more about AUI extensive documentation">Learn more</a>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-overlay opacity-80 bg-black"></div>
    <div class="hero-pattern pattern-bg-2"></div>
</div>
<?php $this->endContent(); ?>
