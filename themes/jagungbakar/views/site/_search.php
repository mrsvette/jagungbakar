<div class="post">
	<div class="title">
		<?php echo CHtml::link(ucwords(CHtml::encode($data->title)), $data->url); ?>
	</div>
	<div class="author">
		posted by <?php echo $data->author->username . ' on ' . date('F j, Y',$data->create_time); ?>
	</div>
	<div class="content">
		<?php
			echo $data->parseContent();
		?>
	</div>
</div>
