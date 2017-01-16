<?php
$this->breadcrumbs = array(
    ucfirst(Yii::app()->controller->module->id) => array('/' . Yii::app()->controller->module->id . '/'),
    Yii::t('global', 'Manage') . ' ' . Yii::t('WhatsappModule.whatsapp', 'Whatsapp'),
);

$this->menu = array(
    array('label' => Yii::t('global', 'List') . ' ' . Yii::t('WhatsappModule.whatsapp', 'Whatsapp'), 'url' => array('view')),
    array('label' => Yii::t('global', 'Create') . ' ' . Yii::t('WhatsappModule.whatsapp', 'Whatsapp'), 'url' => array('view', 't' => '#new')),
);
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><?php echo Yii::t('global', 'Manage') . ' ' . Yii::t('WhatsappModule.whatsapp', 'Whatsapp'); ?>
            #<?php echo $model->id; ?> <?php echo $model->phone; ?> </h4>
    </div>
    <div class="panel-body">
        <?php $this->renderPartial('_form_whatsapp', array('model' => $model)); ?>
    </div>
</div>
