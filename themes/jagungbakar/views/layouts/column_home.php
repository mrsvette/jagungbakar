<?php $this->beginContent('/layouts/layout_default'); ?>
<!-- HOME - BLOG -->
<div class="container" id="home-blog">
	<div class="row">
		<div class="col-md-12">
			<div class="content-head" data-animated="0">
				<h3>Latest Posts</h3>
				<p><span>fresh news</span></p>
			</div>
			<?php $this->widget('PostWidget',array('limit'=>3,'type'=>'latest'));?>
		</div>
	</div>
</div>
<div class="clearfix space20"></div>
<!-- TWITTERFEED-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="twitterfeed">
				<i class="fa fa-twitter"></i>
				<div id="tweetfeed" class="owl-carousel">
					<div>
						<p>Check out 'Momental - Vertical Navigation HTML5 Template' on <a href="#">@EnvatoMarket</a> by <a href="#">@premiummlayers</a> #themeforest <span><a href="#">http://t.co/eva3o65Kky</a></span></p>
					</div>
					<div>
						<p>Nunc euismod ac libero a aliquam. Duis laoreet dictum tempus ut pharetra mauris,<a href="#">@EnvatoMarket</a> by <a href="#">@premiummlayers</a> #themeforest <span><a href="#">http://t.co/eva3o65Kky</a></span></p>
					</div>
					<div>
						<p>Check out 'Momental - Vertical Navigation HTML5 Template' on <a href="#">@EnvatoMarket</a> by <a href="#">@premiummlayers</a> #themeforest <span><a href="#">http://t.co/eva3o65Kky</a></span></p>
					</div>
					<div>
						<p>Nunc euismod ac libero a aliquam. Duis laoreet dictum tempus ut pharetra mauris,<a href="#">@EnvatoMarket</a> by <a href="#">@premiummlayers</a> #themeforest <span><a href="#">http://t.co/eva3o65Kky</a></span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->endContent(); ?>
