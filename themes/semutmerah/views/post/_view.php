<article class="blog-wrap">
	<div class="post-date">
		<span class="day"><?php echo date("d",$data->create_time);?></span>
		<span class="month"><?php echo date("M y",$data->create_time);?></span>
	</div><!-- end post-date -->
	<div class="post-content">
		<h2>
			<?php echo CHtml::link(ucwords(CHtml::encode($data->content_rel->title)), $data->url);?>
		</h2>
		<div class="post-meta">
			<span><i class="fa fa-user"></i> <?php echo $data->author_rel->username;?> </span>
			<span><i class="fa fa-tag"></i> <?php echo implode(', ', $data->tagLinks); ?></span>
		</div><!-- end post-meta -->
		<?php
				if(isset($_GET['id'])){
					//$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
					echo $data->content_rel->content;
					//$this->endWidget();
				}else{
					echo $data->parseContent();
				}
			?>
		<div class="nav">
			<?php echo CHtml::link('Permalink', $data->url); ?> |
			<?php if($data->allow_comment>0):?>
			<?php echo CHtml::link(Yii::t('post','Comments')." ({$data->commentCount})",$data->url.'#comments'); ?> |
			<?php endif;?>
			Last updated on <?php echo date('F j, Y',$data->update_time); ?>
		</div>
	</div>
</article><!-- end blog wrap -->
