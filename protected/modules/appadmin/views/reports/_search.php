<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<div class="col-md-3">
		<?php 
			$this->widget('ext.CJuiDateTimePicker.CJuiDateTimePicker',array(
						'model'=>$model, //Model object
						'attribute'=>'date_from', //attribute name
						'mode'=>'date', //use "time","date" or "datetime" (default)
						'options'=>array(
							'showAnim'=>'fold',
							'dateFormat'=>'yy-mm-dd',
							'changeMonth' => 'true',
							'changeYear'=>'true',
							'constrainInput' => 'true'
						),
						'htmlOptions'=>array('placeholder'=>'date from','class'=>'form-control'),
					));
		?>
		</div>
		<div class="col-md-3">
		<?php 
			$this->widget('ext.CJuiDateTimePicker.CJuiDateTimePicker',array(
						'model'=>$model, //Model object
						'attribute'=>'date_to', //attribute name
						'mode'=>'date', //use "time","date" or "datetime" (default)
						'options'=>array(
							'showAnim'=>'fold',
							'dateFormat'=>'yy-mm-dd',
							'changeMonth' => 'true',
							'changeYear'=>'true',
							'constrainInput' => 'true'
						),
						'htmlOptions'=>array('placeholder'=>'date to','class'=>'form-control'),
					));
		?>
		</div>
		<div class="col-md-6">
			<?php echo CHtml::submitButton('Search'); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
