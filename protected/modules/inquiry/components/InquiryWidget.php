<?php
Yii::import('zii.widgets.CPortlet');

class InquiryWidget extends CPortlet{

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
		$model = new ModInquiry;
		if(isset($_POST['ModInquiry'])){
			$model->attributes = $_POST['ModInquiry'];
			$model->date_entry = date(c);
			$mail_template = Extension::getConfigByModule('inquiry','inquiry_email_template');
			$inquiry_db_saved = Extension::getConfigByModule('inquiry','inquiry_db_saved');
			$inquiry_admin_email = Extension::getConfigByModule('inquiry','inquiry_admin_email');
			if($inquiry_db_saved)
				$exc = $model->save();
			else
				$exc = $model->validate();
			if($exc){
				//send mail
				Yii::import('application.modules.email.models.*');
		        $data = $model->attributes;
				$email = array();
				$email = array_merge($email,$data);
		        $email['to'] = $inquiry_admin_email;
		        $email['to_name'] = Yii::app()->config->get('site_name');
		        $email['code']      = $mail_template;
				
				$template = new ModEmailTemplate;
		        $send = $template->template_send($email);
				//also send to client
				$client_mail_template = Extension::getConfigByModule('inquiry','inquiry_email_template_client');
				$email2 = array();
				$email2 = array_merge($email2,$data);
		        $email2['to'] = $data['email'];
		        $email2['to_name'] = $data['name'];
		        $email2['code']      = $client_mail_template;
				
		        $client_send = $template->template_send($email2);
				
				$inquiry_thankyou_page = Extension::getConfigByModule('inquiry','inquiry_thankyou_page');
				if($inquiry_thankyou_page){
					$this->controller->redirect(array('/inquiry/thankyou'));
				}else{
					Yii::app()->user->setFlash('inquiry',Yii::t('InquiryModule.inquiry','Thank you for submit your inquiry. We will respond to you as soon as possible.'));
					$this->controller->refresh();
				}
			}
		}
		$this->render(
			'_inquiry',
			array(
				'model' => $model,
			)
		);
	}
}

?>
