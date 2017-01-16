<?php
$this->breadcrumbs = array(
    ucfirst(Yii::app()->controller->module->id) => array('/' . Yii::app()->controller->module->id . '/'),
    Yii::t('global', 'Manage') . ' ' . Yii::t('WhatsappModule.whatsapp', 'Whatsapp'),
);

$this->menu = array(
    array('label' => Yii::t('global', 'List') . ' ' . Yii::t('WhatsappModule.whatsapp', 'Whatsapp'), 'url' => array('view')),
    array('label' => Yii::t('global', 'Create') . ' ' . Yii::t('WhatsappModule.whatsapp', 'Whatsapp'), 'url' => '#new', 'linkOptions' => array('data-toggle' => 'tab')),
);
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><?php echo Yii::t('global', 'Manage') . ' ' . Yii::t('WhatsappModule.whatsapp', 'Whatsapp'); ?></h4>
    </div>
    <div class="panel-body">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#general">
                    <strong><?php echo Yii::t('global', 'Manage') . ' ' . Yii::t('WhatsappModule.whatsapp', 'Messages'); ?></strong>
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#new">
                    <strong><?php echo Yii::t('global', 'Create') . ' ' . Yii::t('WhatsappModule.whatsapp', 'Message'); ?></strong>
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#setting">
                    <strong><?php echo Yii::t('WhatsappModule.whatsapp', 'Whatsapp Settings'); ?></strong>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="general" class="tab-pane active">
                <div class="table-responsive">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'dataProvider' => $dataProvider,
                        'filter' => $dataProvider->model,
                        'itemsCssClass' => 'table table-striped mb30',
                        'id' => 'whatsapp-grid',
                        'afterAjaxUpdate' => 'reloadGrid',
                        'columns' => array(
                            array(
                                'value' => '$this->grid->dataProvider->getPagination()->getOffset()+$row+1',
                            ),
                            array(
                                'name' => 'phone',
                                'type' => 'raw',
                                'value' => '($data->status==0)? "<b>".$data->phone."</b>":$data->phone',
                            ),
                            array(
                                'name' => 'message',
                                'type' => 'raw',
                                'value' => '($data->status==0)? "<b>".$data->message."</b>":$data->message',
                            ),
                            array(
                                'name' => 'date_entry',
                                'type' => 'raw',
                                'value' => '($data->status==0)? "<b>".$data->date_entry."</b>":$data->date_entry',
                            ),
                            array(
                                'class' => 'CButtonColumn',
                                'template' => '{detail}{view}{delete}',
                                'buttons' => array
                                (
                                    'detail' => array(
                                        'label' => '<i class="fa fa-search"></i>',
                                        'imageUrl' => false,
                                        'options' => array('title' => 'Detail'),
                                        'url' => 'Yii::app()->createUrl(\'whatsapp/wDefault/detail\',array(\'id\'=>$data->id))',
                                        'visible' => 'Rbac::ruleAccess(\'read_p\')',
                                    ),
                                    'view' => array(
                                        'label' => '<i class="fa fa-pencil"></i>',
                                        'imageUrl' => false,
                                        'options' => array('title' => 'View'),
                                        'url' => 'Yii::app()->createUrl(\'whatsapp/wDefault/manage\',array(\'id\'=>$data->id))',
                                        'visible' => 'Rbac::ruleAccess(\'read_p\')',
                                    ),
                                    'delete' => array(
                                        'label' => '<i class="fa fa-trash-o"></i>',
                                        'imageUrl' => false,
                                        'options' => array('title' => 'Delete'),
                                        'visible' => 'Rbac::ruleAccess(\'delete_p\')',
                                    ),
                                ),
                                'htmlOptions' => array('style' => 'width:10%;', 'class' => 'table-action'),
                            ),
                        ),
                    )); ?>
                </div>
            </div>
            <div id="new" class="tab-pane">
                <?php echo $this->renderPartial('_form_whatsapp', array('model' => new ModWhatsapp('create'))); ?>
            </div>
            <div id="setting" class="tab-pane">
                <?php echo $this->renderPartial('_form_setting', array('model' => $setting)); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        var tab = "<?php echo $_GET['t'];?>";
        if (tab) {
            $('a[href="' + tab + '"]').trigger('click');
        }
    });
</script>
