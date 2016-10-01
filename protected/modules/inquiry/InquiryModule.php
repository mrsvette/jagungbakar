<?php

class InquiryModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		
		$this->defaultController = 'iDefault';

		Yii::app()->setComponents(array(
			'errorHandler'=>array(
				'class'=>'CErrorHandler',
				'errorAction'=>'/appadmin/default/error',
			),
			'user'=>array(
				'class'=>'CWebUser',
				'stateKeyPrefix'=>'jagungbakar',
				'loginUrl'=>Yii::app()->createUrl('appadmin/default/login'),
				'allowAutoLogin'=>true,
			),
		), false);

		//set view path
		$this->setLayoutPath(Yii::getPathOfAlias('application.modules.appadmin').'/views/layouts');
		// import the module-level models and components
		$this->setImport(array(
			'inquiry.models.*',
			'inquiry.components.*',
			'appadmin.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			if(!Extension::getIsInstalled(array('id'=>'inquiry')))
				throw new CHttpException(404,'The requested page does not exist.');
			return true;
		}
		else
			return false;
	}

	public function install()
	{
		$sql = "
		CREATE TABLE IF NOT EXISTS `tbl_mod_inquiry` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(128) NOT NULL,
		  `email` varchar(128) NOT NULL,
		  `phone` varchar(64) NOT NULL,
		  `address` text,
		  `website` varchar(128) DEFAULT NULL,
		  `description` text NOT NULL,
		  `status` int(11) DEFAULT '0' COMMENT '0=unread, 1=read',
		  `date_entry` datetime NOT NULL,
		  `date_update` datetime DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
		
		$command = Yii::app()->db->createCommand($sql);
		$command->execute();
		return true;
	}

	public function fetchNavigation()
    {
		Yii::import('application.modules.inquiry.models.ModInquiry');
		$badge = '';
		$count = ModInquiry::counter(0);
		if($count>0)
			$badge .= ' <span class="badge badge-primary">'.ModInquiry::counter(0).'</span>';
        return array(
            'manage'=> array(
                array(
					'label'=>'<span class="side_icon ion-ios7-folder-outline"></span> Inquiry'.$badge,
					'url'=>array('/inquiry'), 
					'visible'=>Extension::getIsInstalled(array('id'=>'inquiry'))
				),
            ),
        );
    }
}
