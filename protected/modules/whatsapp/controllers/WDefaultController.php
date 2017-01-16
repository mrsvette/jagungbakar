<?php

class WDefaultController extends EController
{
    public static $_alias = 'Manage Whatsapp';

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('index', 'view', 'manage', 'detail'),
                'expression' => 'Rbac::ruleAccess(\'read_p\')',
            ),
            array('allow',
                'actions' => array('create', 'setting'),
                'expression' => 'Rbac::ruleAccess(\'create_p\')',
            ),
            array('allow',
                'actions' => array('update'),
                'expression' => 'Rbac::ruleAccess(\'update_p\')',
            ),
            array('allow',
                'actions' => array('delete'),
                'expression' => 'Rbac::ruleAccess(\'delete_p\')',
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $this->forward('view');
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $model = $this->loadModel($id);
        $model->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view'));
    }

    /**
     * Manages all models.
     */
    public function actionView()
    {
        $criteria = new CDbCriteria;
        $criteria->order = 'id DESC';
        if (Yii::app()->request->isAjaxRequest && isset($_GET['ModWhatsapp'])) {
            foreach ($_GET['ModWhatsapp'] as $attr1 => $val1) {
                if (!empty($val1))
                    $criteria->compare($attr1, $val1, true);
            }
        }

        $dataProvider = new CActiveDataProvider('ModWhatsapp', array('criteria' => $criteria, 'pagination' => array('pageSize' => 5)));

        $criteria2 = new CDbCriteria;
        $criteria2->compare('name', Yii::app()->controller->module->id);
        $setting = Extension::model()->find($criteria2);

        $this->render('view', array(
            'dataProvider' => $dataProvider,
            'setting' => $setting,
        ));
    }

    public function actionManage($id)
    {
        $model = $this->loadModel($id);

        $this->render('manage', array(
            'model' => $model,
        ));
    }

    public function actionDetail($id)
    {
        $model = $this->loadModel($id);
        if ($model->status < 1) {
            $model->status = 1;
            $model->update('status');
        }

        $this->render('detail', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        if (Yii::app()->request->isPostRequest) {
            Yii::app()->clientScript->scriptMap['jquery.js'] = false;
            $model = new ModWhatsapp('create');
            $model->attributes = $_POST['ModWhatsapp'];
            $model->date_entry = date(c);
            $whatsapp_phone_number = Extension::getConfigByModule('whatsapp', 'whatsapp_phone_number');
            $whatsapp_password = Extension::getConfigByModule('whatsapp', 'whatsapp_password');
            if ($whatsapp_db_saved)
                $exc = $model->save();
            else
                $exc = $model->validate();
            if ($exc) {
                $config['Farid'] = [
                    'fromNumber'    => $whatsapp_phone_number,
                    'nick'          => 'FARID',
                    'waPassword'    => $whatsapp_password,
                    //'email'         => 'testemail@gmail.com',
                    //'emailPassword' => 'gmailpassword',
                ];
                $wa = new CWhatsapp($config);
                $wa->number = $whatsapp_phone_number;
                $wa->nick = 'Jagung Bakar';
                $wa->messages = $model->message;
                $wa->password = $whatsapp_password;
                $wa->inputs = array(
                    'to' => array('6281325159948'),
                    'message' => $model->message
                );
                //var_dump($wa);exit;
                var_dump($wa->sendMessage());exit;

                echo CJSON::encode(array(
                    'status' => 'success',
                    'div' => 'Data berhasil disimpan',
                ));
            } else {
                echo CJSON::encode(array(
                    'status' => 'failed',
                    'div' => $this->renderPartial('_form_whatsapp', array('model' => $model), true, true),
                ));
            }
            exit;
        }
    }

    public function actionUpdate($id)
    {
        if (Yii::app()->request->isPostRequest) {
            Yii::app()->clientScript->scriptMap['jquery.js'] = false;
            $model = $this->loadModel($id);
            $model->date_update = date(c);
            if ($model->save()) {
                echo CJSON::encode(array(
                    'status' => 'success',
                    'div' => 'Data berhasil disimpan',
                ));
            } else {
                echo CJSON::encode(array(
                    'status' => 'failed',
                    'div' => $this->renderPartial('_form_whatsapp', array('model' => $model), true, true),
                ));
            }
            exit;
        }
    }

    public function actionSetting()
    {
        if (Yii::app()->request->isPostRequest) {
            $criteria = new CDbCriteria;
            $criteria->compare('name', $_POST['name']);
            $model = Extension::model()->find($criteria);
            if (!$model instanceof Extension)
                throw new CHttpException(404, 'The requested page does not exist.');
            if (Yii::app()->request->isPostRequest) {
                $save_configs = $model->saveConfig($_POST);
                if ($save_configs) {
                    if($_POST['whatsapp_request_type'] == 0) {
                        // Create an instance of Registration.
                        $debug = true;
                        $username = $_POST['whatsapp_phone_number'];
                        $w = new Registration($username, $debug);
                        $w->codeRequest('sms');
                        $w->codeRegister('123456');
                    }elseif ($_POST['whatsapp_request_type'] == 1){
                        $debug = false;
                        $username = $_POST['whatsapp_phone_number'];
                        $code = $_POST['whatsapp_verification_number']; // Received Verification Code

                        if(empty($username)){
                            echo CJSON::encode(array(
                                'status' => 'failed',
                                'div' => "Mobile Number can't be Empty"
                            ));
                            exit(0);
                        }
                        if (!preg_match('!^\d+$!', $username))
                        {
                            echo CJSON::encode(array(
                                'status' => 'failed',
                                'div' => "Wrong number. Do NOT use '+' or '00' before your number\n"
                            ));
                            exit(0);
                        }
                        $identityExists = file_exists(Yii::getPathOfAlias('application.modules.'.$this->module->id.'.components.wadata').'/id.'.$username.'.dat');

                        $w = new Registration($username, $debug);

                        if (!$identityExists)
                        {
                            echo CJSON::encode(array(
                                'status' => 'failed',
                                'div' => 'Identity Doesn\'t Exists'
                            ));
                            exit(0);
                        }
                        else
                        {

                            try {
                                $result = $w->codeRegister($code);
                                //echo "Your username is: ".$result->login."<BR>";
                                //echo "Your password is: ".$result->pw."<BR>";
                                $_POST['whatsapp_password'] = $result->pw;
                                $model->saveConfig($_POST);
                            } catch(Exception $e) {
                                echo CJSON::encode(array(
                                    'status' => 'failed',
                                    'div' => $e->getMessage()
                                ));
                                exit(0);
                            }

                        }
                    }

                    echo CJSON::encode(array(
                        'status' => 'success',
                        'div' => Yii::t('global', 'Your config has been successfully saved.')
                    ));
                    exit;
                }
            }
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Extension the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = ModWhatsapp::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }


}
