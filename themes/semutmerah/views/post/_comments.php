<ul class="comment-list">
	<?php foreach($comments as $comment): ?>
	<li>
		<article class="comment">
			<img src="<?php echo Yii::app()->request->baseUrl;?>/uploads/images/avatar.jpg" alt="" class="comment-avatar"/>
			<div class="comment-content">
				<h4 class="comment-author">
					<?php echo $comment->authorLink; ?> <small class="comment-meta"><?php echo date('F j, Y \a\t h:i a',$comment->create_time); ?></small>
				</h4>
				<?php echo nl2br(CHtml::encode($comment->content)); ?>
			</div>
		</article><!-- End .comment -->
	</li>
	<?php endforeach; ?>
</ul>
