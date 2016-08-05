<ul>
<?php foreach($comments as $comment): ?>
<li><!-- <li class="sub-comment1">-->
	<img src="<?php echo Yii::app()->request->baseUrl;?>/uploads/images/avatar.jpg" alt=""/>
	<div class="comments-inner">
	<div class="comment-author"><?php echo $comment->authorLink; ?> <span><?php echo date('F j, Y \a\t h:i a',$comment->create_time); ?></span></div>
	<p><?php echo nl2br(CHtml::encode($comment->content)); ?></p>
	</div>
</li>
<?php endforeach; ?>
</ul>
