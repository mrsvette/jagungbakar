<?php
$this->breadcrumbs=array(
	$model->content_rel->title,
);

//if(empty($model->content_rel->meta_title))
	//$this->pageTitle=$model->content_rel->title.' | '.Yii::app()->config->get('site_name');
//else
	//$this->pageTitle=$model->content_rel->meta_title;

?>

<?php $this->renderPartial('_view', array(
	'data'=>$model,
)); ?>

<div id="comments">
	<?php if($model->commentCount>=1): ?>
		<h3>
			<?php echo $model->commentCount>1 ? $model->commentCount . ' comments' : 'One comment'; ?>
		</h3>

		<?php $this->renderPartial('_comments',array(
			'post'=>$model,
			'comments'=>$model->comments,
		)); ?>
	<?php endif; ?>
	
	
	<?php if($model->allow_comment>0):?>
		<h3>Leave a Comment</h3>

		<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
			<div class="flash-success">
				<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
			</div>
		<?php else: ?>
			<?php $this->renderPartial('_comment_form',array(
				'model'=>$comment,
			)); ?>
		<?php endif; ?>
	<?php endif; ?>
	
</div><!-- comments -->
