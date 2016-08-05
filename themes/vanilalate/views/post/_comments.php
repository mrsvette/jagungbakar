<div id="comments">
<ol class="comment-list">
	<?php foreach($comments as $comment): ?>
	<li>
		<div class="avatar">
			<img src="<?php echo Yii::app()->request->baseUrl;?>/uploads/images/avatar.jpg" alt="" class="comment-avatar"/>
		</div>
		<div class="comment_right clearfix">
			<div class="comment_info">
				<?php echo $comment->authorLink; ?> on <small class="comment-meta"><?php echo date('F j, Y \a\t h:i a',$comment->create_time); ?></small>
			</div>
			<p><?php echo nl2br(CHtml::encode($comment->content)); ?></p>
		</div>
	</li>
	<?php endforeach; ?>
</ol>
</div>
