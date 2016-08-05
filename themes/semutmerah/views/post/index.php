<?php if(!empty($_GET['tag'])): ?>
<h1>Posts Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php else:?>
<section class="post-wrapper-top dm-shadow">
    	<div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo Yii::app()->createUrl('/home');?>">Home</a></li>
                    <li><?php echo $category->category_name;?></li>
                </ul><!-- end breadcrumb -->
                <h2><?php echo $category->category_name;?></h2>
            </div><!-- end col-12 -->
        </div><!-- end container -->
</section><!-- end post-wrapper-top -->
<?php endif; ?>
<section class="section-single blog-wrapper dm-shadow">
	<div class="container">
		<div class="single-post-wrapper col-lg-9 col-md-9 col-sm-12 clearfix" id="content-frame">
			<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_view',
				'template'=>"{items}\n{pager}",
				'itemsCssClass'=>'row-fluid',
			)); ?>
		</div>
		<div id="sidebar" class="col-lg-3 col-md-3 col-sm-12 clearfix">
			<div class="widget clearfix">
				<div class="widget-title"><h3><?php echo Yii::t('post','Categories');?></h3></div>
				<ul class="categories">
					<?php foreach(PostCategory::model()->findAll() as $category):?>
                    	<li><?php echo CHtml::link($category->category_name,array('post/index','type'=>$category->key));?></li>
					<?php endforeach;?>
				</ul>
			</div><!-- end widget -->
			<div class="widget clearfix">
				<div class="widget-title"><h3><?php echo Yii::t('post','Latest Post');?></h3></div>
				<ul class="categories">
					<?php foreach(Post::getLatestPost() as $idx=>$lpost):?>
                    	<li><?php echo $lpost['title'];?></li>
					<?php endforeach;?>
				</ul>
			</div><!-- end widget -->
		</div><!-- end sidebar -->
	</div>
</section>
