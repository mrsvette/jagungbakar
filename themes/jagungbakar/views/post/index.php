<!-- BLOG POST CONTENT -->
<div class="container">
	<div id="m-blog-content">
		<div class="row">
			<div class="col-md-12" id="content-frame">
<?php if(!empty($_GET['tag'])): ?>
<h1>Posts Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'template'=>"{items}\n{pager}",
	'itemsCssClass'=>'row-fluid',
)); ?>
			</div>
		</div>
	</div>
</div>
