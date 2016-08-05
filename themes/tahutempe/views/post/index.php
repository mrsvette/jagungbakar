<?php if(!empty($_GET['tag'])): ?>
<h1>Posts Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php else:?>
<div class="hero-box hero-box-smaller full-bg-13 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
    <div class="container">
        <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s"><?php echo $category->category_name;?></h1>
        <p class="hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s"><?php echo $category->notes;?></p>
    </div>
    <div class="hero-overlay bg-black"></div>
</div>
<?php endif; ?>
<div id="page-content" class="container mrg25T">
    <div class="row">
        <div class="col-md-9" id="content-frame">
            <?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_view',
				'template'=>"{items}\n{pager}",
				'itemsCssClass'=>'row-fluid',
			)); ?>
		</div>
        <div class="col-md-3">
            <div class="content-box">
				<h3 class="content-box-header bg-default">
					<?php echo Yii::t('post','Categories');?>
				</h3>
    			<div class="posts-list content-box-wrapper">
				<ul class="">
					<?php foreach(PostCategory::model()->findAll() as $category):?>
                    <li>
						<div class="post-body">
							<?php echo CHtml::link($category->category_name,array('post/index','type'=>$category->key));?>
						</div>
					</li>
					<?php endforeach;?>
				</ul>
    			</div>
			</div>
            <div class="content-box">
				<h3 class="content-box-header bg-default">
					<?php echo Yii::t('post','Latest Post');?>
				</h3>
    			<div class="posts-list content-box-wrapper">
				<ul class="">
					<?php foreach(Post::getLatestPost() as $idx=>$lpost):?>
                	<li>
						<div class="post-body">
							<?php echo $lpost['title'];?>
						</div>
					</li>
					<?php endforeach;?>
				</ul>
    			</div>
			</div>
		</div>
	</div>
</div>
