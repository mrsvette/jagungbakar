<?php
$this->breadcrumbs=array(
	$model->content_rel->title,
);
$this->pageTitle=$model->content_rel->title.' - '.Yii::app()->config->get('site_name');
?>
<!-- BLOG POST CONTENT -->
<div class="container">
	<div id="m-blog-content">
		<div class="row">
			<div class="col-md-12" id="content-frame">
				<article class="item">
					<div>
						<h4><?php echo $model->content_rel->title;?></h4>
						<div class="sep2"></div>
						<?php echo $model->content_rel->content;?>
					</div>
					<!-- Comments -->
					<div class="clearfix space20"></div>
					<div class="comments-wrap" data-animated="0">
						<?php if($model->commentCount>=1): ?>
							<h5>
								<?php echo $model->commentCount>1 ? $model->commentCount . ' comments' : 'One comment'; ?>
							</h5>

							<?php $this->renderPartial('_comments',array(
								'post'=>$model,
								'comments'=>$model->comments,
							)); ?>
						<?php endif; ?>
					</div>
					<div class="clearfix space20"></div>
						<?php if($model->allow_comment>0):?>
						<div class="article-comment-form" data-animated="0">
							<h5>Leave a Comment</h5>

							<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
								<div class="flash-success">
									<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
								</div>
							<?php else: ?>
								<?php $this->renderPartial('_comment_form',array(
									'model'=>$comment,
								)); ?>
							<?php endif; ?>
						</div>
						<?php endif; ?>
				</article>
			</div>
		</div>
	</div>
</div>
