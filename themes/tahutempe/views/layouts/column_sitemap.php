<?php $this->beginContent('/layouts/layout_inside'); ?>
<div class="hero-box hero-box-smaller full-bg-13 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
    <div class="container">
        <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s"><?php echo Yii::t('page','Site Map');?></h1>
    </div>
    <div class="hero-overlay bg-black"></div>
</div>
<div class="large-padding pad25B">
    <div class="container pad25B row">
        <div class="col-md-12" id="content-frame">
            <?php $maps=Post::getSiteMap();?>
			<?php foreach($maps as $type=>$map):?>
            <div class="col-sm-4 col-xs-12">
					<h3 class="widget-title">
						<span><?php echo ucwords($type);?></span>
					</h3>	
					<ul class="check">
					<?php if($type=='post' && is_array($map)):?>
						<?php foreach($map as $ipost=>$datapost):?>
						<li><?php echo CHtml::link($datapost['title'],array('post','id'=>$datapost['id'],'title'=>$datapost['title']));?></li>
						<?php endforeach;?>
					<?php elseif($type=='page' && is_array($map)):?>
						<?php foreach($map as $ipage=>$datapage):?>
						<li><?php echo CHtml::link($datapage['title'],array('page/view','slug'=>$datapage['slug']));?></li>
						<?php endforeach;?>
					<?php elseif($type=='category' && is_array($map)):?>
						<?php foreach($map as $icategory=>$datacategory):?>
						<li><?php echo CHtml::link($datacategory['title'],array('post/'.$datacategory['slug']));?></li>
						<?php endforeach;?>
					<?php endif;?>
					</ul>
            </div><!-- end col-sm-4 -->
			<?php endforeach;?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>
