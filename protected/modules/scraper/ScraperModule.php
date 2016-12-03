<?php

class ScraperModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		
		$this->defaultController = 'scDefault';

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
			'scraper.models.*',
			'scraper.components.*',
			'appadmin.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			if(!Extension::getIsInstalled(array('id'=>'scraper')))
				throw new CHttpException(404,'The requested page does not exist.');
			return true;
		}
		else
			return false;
	}

	public function install()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `tbl_mod_scraper` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `title` varchar(128) NOT NULL,
		  `url` text,
		  `tag_selector` varchar(128) DEFAULT NULL,
		  `result` text,
		  `date_entry` datetime DEFAULT NULL,
		  `user_entry` int(11) NOT NULL,
		  `date_update` datetime DEFAULT NULL,
		  `user_update` int(11) DEFAULT '0',
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
		
		$command = Yii::app()->db->createCommand($sql);
		$command->execute();
		return true;
	}

	public function fetchNavigation()
    {
        return array(
            'manage'=> array(
                array(
					'label'=>'<span class="side_icon ion-ios7-folder-outline"></span> Web Scraper',
					'url'=>array('/scraper/scDefault/view'), 
					'visible'=>Extension::getIsInstalled(array('id'=>'scraper'))
				),
            ),
        );
    }
}
