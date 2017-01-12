<?php
Yii::import('zii.widgets.CPortlet');

class WhatsappWidget extends CPortlet{

	public $visible = true;
	
	public function init()
    {
        if($this->visible)
        {
 
        }
    }
 
    public function run()
    {
        if($this->visible)
        {
            $this->renderContent();
        }
    }
	
	protected function renderContent()
	{
		$model = new ModWhatsapp;
		if(isset($_POST['ModWhatsapp'])){
			$model->attributes = $_POST['ModWhatsapp'];
			$model->date_entry = date(c);
			$mail_template = Extension::getConfigByModule('whatsapp','whatsapp_email_template');
			$whatsapp_db_saved = Extension::getConfigByModule('whatsapp','whatsapp_db_saved');
			$whatsapp_admin_email = Extension::getConfigByModule('whatsapp','whatsapp_admin_email');
			if($whatsapp_db_saved)
				$exc = $model->save();
			else
				$exc = $model->validate();
			if($exc){
				//send mail
				Yii::import('application.modules.email.models.*');
		        $data = $model->attributes;
				$email = array();
				$email = array_merge($email,$data);
		        $email['to'] = $whatsapp_admin_email;
		        $email['to_name'] = Yii::app()->config->get('site_name');
		        $email['code']      = $mail_template;
				
				$template = new ModEmailTemplate;
		        $send = $template->template_send($email);
				//also send to client
				$client_mail_template = Extension::getConfigByModule('whatsapp','whatsapp_email_template_client');
				$email2 = array();
				$email2 = array_merge($email2,$data);
		        $email2['to'] = $data['email'];
		        $email2['to_name'] = $data['name'];
		        $email2['code']      = $client_mail_template;
				
		        $client_send = $template->template_send($email2);
				
				$whatsapp_thankyou_page = Extension::getConfigByModule('whatsapp','whatsapp_thankyou_page');
				if($whatsapp_thankyou_page){
					$this->controller->redirect(array('/whatsapp/thankyou'));
				}else{
					Yii::app()->user->setFlash('whatsapp',Yii::t('WhatsappModule.whatsapp','Thank you for submit your whatsapp. We will respond to you as soon as possible.'));
					$this->controller->refresh();
				}
			}
		}
		$this->render(
			'_whatsapp',
			array(
				'model' => $model,
			)
		);
	}
}

?>
