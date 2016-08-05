<div class="post">
	<a href="blog_post.html" title="single_post.html"><img src="img/blog-1.jpg" alt="" class="img-responsive"></a>
	<div class="post_info clearfix">
		<div class="post-left">
			<ul>
				<li><i class="icon-calendar-empty"></i>On <span><?php echo date("d F Y",$data->create_time);?></span></li>
				<li><i class="icon-user"></i>By <?php echo $data->author_rel->username;?></li>
				<li><i class="icon-tags"></i>Tags <?php echo implode(', ', $data->tagLinks); ?></li>
			</ul>
		</div>
		<?php if($data->allow_comment>0):?>
		<div class="post-right"><i class="icon-comment"></i><a href="#"><?php echo $data->commentCount;?> </a>Comments</div>
		<?php endif;?>
	</div>
	<h2><?php echo CHtml::link(ucwords(CHtml::encode($data->content_rel->title)), $data->url);?></h2>
	<p>
		<?php
				if(isset($_GET['id'])){
					//$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
					echo $data->content_rel->content;
					//$this->endWidget();
				}else{
					echo $data->parseContent();
				}
		?>
	</p>
</div><!-- end post -->
