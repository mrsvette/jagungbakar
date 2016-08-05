<?php
$this->pageTitle=$model->content_rel->title.' - '.Yii::app()->config->get('site_name');
?>
<div class="hero-box hero-box-smaller full-bg-13 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
    <div class="container">
        <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s"><?php echo $model->content_rel->title;?></h1>
    </div>
    <div class="hero-overlay bg-black"></div>
</div>

<div id="page-content" class="container mrg25T">
    <div class="row">
        <div class="col-md-9" id="content-frame">
			<?php $this->renderPartial('_view', array(
					'data'=>$model,
					'class'=>'blog-box-single',
			)); ?>
			<?php if($model->commentCount>=1): ?>
			<div id="comments" class="blog-comments">
				<h3 class="p-title title-alt">
					<span><?php echo $model->commentCount>1 ? $model->commentCount . ' '.Yii::t('post','comments') : Yii::t('post','One comment'); ?></span>
				</h3>
				<?php $this->renderPartial('_comments',array(
					'post'=>$model,
					'comments'=>$model->comments,
				)); ?>
			</div>
			<?php endif; ?>  
			<?php if($model->allow_comment):?>
			<div id="add-comment">
				<h3 class="p-title title-alt">
				<span><?php echo Yii::t('post','Leave a comment');?></span>
				</h3>
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
		</div><!-- col-md-3 -->
	</div><!-- end row -->
</div><!-- end page-content -->
