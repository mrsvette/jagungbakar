<?php if(!empty($this->type)):?>
<?php $this->controller->renderPartial('/site/widget/_gallery_'.$this->type,array('dataProvider'=>$dataProvider,'widget'=>$this));?>
<?php else:?>
<?php $this->controller->renderPartial('/site/widget/_gallery',array('dataProvider'=>$dataProvider,'widget'=>$this));?>
<?php endif;?>
