<article class="item">
	<h4><?php echo CHtml::link(ucwords(CHtml::encode($data->content_rel->title)), $data->url); ?></h4>
	<div class="content" style="text-align:justify;">
		<?php
			if(isset($_GET['id'])){
				//$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
				echo $data->content_rel->content;
				//$this->endWidget();
			}else{
				echo $data->parseContent();
			}
		?>
	</div>
	<div class="nav">
		<b>Tags:</b>
		<?php echo implode(', ', $data->tagLinks); ?>
		<br/>
		<?php echo CHtml::link('Permalink', $data->url); ?> |
		<?php if($data->allow_comment>0):?>
		<?php echo CHtml::link("Comments ({$data->commentCount})",$data->url.'#comments'); ?> |
		<?php endif;?>
		Last updated on <?php echo date('F j, Y',$data->update_time); ?>
	</div>
</article>
