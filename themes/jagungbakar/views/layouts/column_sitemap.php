<?php $this->beginContent('/layouts/layout_inside'); ?>
	<section class="section-single">
    	<div class="container">
        	<div class="general_wrapper clearfix" id="content-frame">
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
            </div><!-- general_wrapper -->
        </div><!-- end container -->
    </section><!-- end section-whitebg dm-shadow -->
<?php $this->endContent(); ?>
