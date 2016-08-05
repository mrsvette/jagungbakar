<?php
$this->pageTitle=$model->content_rel->title.' - '.Yii::app()->config->get('site_name');
?>
<section id="sub-header">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 text-center">
			<h1><?php echo $model->content_rel->title;?></h1>
			<p class="lead boxed "><?php echo $model->category->category_name;?></p>
			<p class="lead">
				<?php echo $model->category->notes;?> 
			</p>
		</div>
	</div><!-- End row -->
</div><!-- End container -->
<div class="divider_top"></div>
</section><!-- End sub-header -->

<section id="main_content">

<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::app()->createUrl('/home');?>">Home</a></li>
		<li class="active"><?php echo $model->content_rel->title;?></li>
	</ol>

	 <div class="row">
     <aside class="col-md-4">
     	<div class=" box_style_1">
				<div class="widget" style="margin-top:15px;">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
						<button class="btn btn-default" type="button" style="margin-left:0;"><i class="icon-search"></i></button>
						</span>
					</div><!-- /input-group -->
				</div><!-- End Search -->
                
				<div class="widget">
					<h4>Text widget</h4>
					<p>
						 Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
					</p>
				</div><!-- End widget -->
               
				<div class="widget">
					<h4>Recent post</h4>
					<ul class="recent_post">
						<?php foreach(Post::getLatestPost() as $idx=>$lpost):?>
                    	<li>
							<i class="icon-calendar-empty"></i> <?php echo $lpost['date'];?>
							<div><?php echo CHtml::link($lpost['title'],array('/post/view','id'=>$lpost['id'],'title'=>$lpost['title']));?></div>
						</li>
						<?php endforeach;?>
					</ul>
				</div><!-- End widget -->
                
				<div class="widget tags add_bottom_30">
					<h4>Tags</h4>
					<a href="#">Lorem ipsum</a>
					<a href="#">Dolor</a>
					<a href="#">Long established</a>
					<a href="#">Sit amet</a>
					<a href="#">Latin words</a>
					<a href="#">Excepteur sint</a>
				</div><!-- End widget -->
                
			</div><!-- End box-sidebar -->
     </aside><!-- End aside -->
     
     <div class="col-md-8">
     		<?php $this->renderPartial('_view', array(
						'data'=>$model,
			)); ?>
			<?php if($model->commentCount>=1): ?>
				<hr>
				<h3><?php echo $model->commentCount>1 ? $model->commentCount . ' '.Yii::t('post','comments') : Yii::t('post','One comment'); ?></h3>
				<?php $this->renderPartial('_comments',array(
					'post'=>$model,
					'comments'=>$model->comments,
				)); ?>
			<?php endif; ?>  
      		
			<?php if($model->allow_comment):?>
				<h4>Leave a comment</h4>
				<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
					<div class="alert alert-success">
						<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
					</div>
				<?php endif; ?>
				<?php $this->renderPartial('_comment_form',array(
						'model'=>$comment,
				)); ?>
			<?php endif;?> 
     </div><!-- End col-md-8-->
  </div>  <!-- End row-->    
</div><!-- End container -->
</section><!-- End main_content-->
