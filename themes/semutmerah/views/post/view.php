<?php
$this->pageTitle=$model->content_rel->title.' - '.Yii::app()->config->get('site_name');
?>
<section class="post-wrapper-top dm-shadow">
	<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<ul class="breadcrumb">
				<li><a href="<?php echo Yii::app()->createUrl('/home');?>">Home</a></li>
				<li><?php echo $model->content_rel->title;?></li>
			</ul><!-- end breadcrumb -->
			<h2><?php echo $model->content_rel->title;?></h2>
		</div><!-- end col-12 -->
	</div><!-- end container -->
</section><!-- end post-wrapper-top -->

<section class="section-single blog-wrapper dm-shadow">
	<div class="container">
		<div class="single-post-wrapper col-lg-9 col-md-9 col-sm-12 clearfix" id="content-frame">
			<?php $this->renderPartial('_view', array(
						'data'=>$model,
			)); ?>
			<?php if($model->commentCount>=1): ?>
			<div id="comments_wrapper">
				<div class="widget-title">
					<h3><?php echo $model->commentCount>1 ? $model->commentCount . ' '.Yii::t('post','comments') : Yii::t('post','One comment'); ?></h3>
				</div>
				<?php $this->renderPartial('_comments',array(
					'post'=>$model,
					'comments'=>$model->comments,
				)); ?>
			</div><!-- div comments -->
			<?php endif; ?>  
			<?php if($model->allow_comment):?>
				<div class="clearfix"></div>
				<div class="comments_form">
					<div class="widget-title">
						<h3><?php echo Yii::t('post','Leave a comment');?></h3>
						<hr>
					</div>
				<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
					<div class="alert alert-success">
						<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
					</div>
				<?php endif; ?>
					<?php $this->renderPartial('_comment_form',array(
						'model'=>$comment,
					)); ?>
				</div>
			<?php endif;?>
		</div><!-- single-post-wrapper -->
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
	</div><!-- end container -->
</section><!-- end section-single -->
