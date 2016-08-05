<div class="blog-box <?php echo $class;?> blog-box-alt row">
	<div class="post-content-wrapper">
		<?php echo CHtml::link('<h3>'.ucwords(CHtml::encode($data->content_rel->title)).'</h3>', $data->url, array('class'=>'post-title'));?>
		<div class="post-meta">
			<span>
				<i class="glyph-icon icon-user"></i>
       			<?php echo $data->author_rel->username;?>
   			</span>
    		<span>
               	<i class="glyph-icon icon-clock-o"></i>
 				<?php echo date("d M Y",$data->create_time);?>
  			</span>
      		<span>
         		<i class="glyph-icon icon-comments-o"></i>
           		<?php if($data->allow_comment>0):?>
				<?php echo CHtml::link(Yii::t('post','Comments')." ({$data->commentCount})",$data->url.'#comments'); ?> |
				<?php endif;?>
         	</span>
     	</div>
      	<div class="post-content">
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
	</div>
</div>
