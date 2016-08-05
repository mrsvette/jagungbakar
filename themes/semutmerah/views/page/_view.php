<h3 class="page-header hidden"><?php echo ucwords(Yii::t('page',CHtml::encode($data->content_rel->title))); ?></h3>
	<?php
		//$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
			echo $data->content_rel->content;
		//$this->endWidget();
	?>
