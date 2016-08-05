<ul class="comments-list">
	<?php foreach($comments as $comment): ?>
	<li class="panel">
		<div class="panel-body">
			<div class="comment-image">
				<img class="img-rounded lazy img-responsive" alt="" data-original="<?php echo Yii::app()->request->baseUrl;?>/uploads/images/avatar.jpg" src="<?php echo Yii::app()->request->baseUrl;?>/uploads/images/avatar.jpg" style="display: block;">
			</div>
			<div class="comment-wrapper">
				<div class="comment-header clearfix">
					<div class="float-left">
						<div class="comment-author">
							<?php echo $comment->authorLink; ?>
						</div>
						<div class="comment-date">
							<i class="glyph-icon icon-clock-o"></i>
							<?php echo date('F j, Y \a\t h:i a',$comment->create_time); ?>
						</div>
					</div>
				</div>
				<div class="comment-body">
					<p><?php echo nl2br(CHtml::encode($comment->content)); ?></p>
				</div>
			</div>
		</div><!-- panel-body -->
	</li>
	<?php endforeach; ?>
</ul>
