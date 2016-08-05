<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'{{appname}}',
	'preload'=>array('log'),
	'language'=>'{{language}}',
	'theme'=>'{{theme}}',
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	'defaultController'=>'site',
	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'appadmin',
	),
	'components'=>array(
		'config' => array(
			 'class' => 'application.extensions.EConfig',
		 ),
		'user'=>array(
			'allowAutoLogin'=>true,
		),
		/*'db'=>array(
			'connectionString'=>'sqlite:'.dirname(__FILE__).'/../data/blog-test.db',
		),*/
		'db'=>array(
			'connectionString' => 'mysql:host={{host}};dbname={{dbname}}',
			'emulatePrepare' => true,
			'username' => '{{username}}',
			'password' => '{{password}}',
			'charset' => 'utf8',
			'tablePrefix' => 'app_',
		),
		'errorHandler'=>array(
            'errorAction'=>'site/error',
        ),
        'urlManager'=>array(
			'class'=>'ext.DbUrlManager.EDbUrlManager',
        	'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<slug:[\w-]+>'=>array(
					'page/view',
					'type'=>'db',
					'fields'=>array(
						'slug'=>array(
						    'table'=>'app_post_content',
						    'field'=>'slug'
						),
					),
				),
				'<id:\d+>/<title:.*?>'=>'post/view',
        		'posts/<tag:.*?>'=>'post/index',
        		'post/<type:.*?>'=>'post/index',
        		'<lang:.*?>/home'=>'site/home',
				'<controller:\w+>/<id:\d+>/<title:.*?>'=>'<controller>/view',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
		'bbmail'=>array(
				'class'=>'application.extensions.bbmail.BBMail', 
		),
		'file'=>array(
				'class'=>'application.extensions.file.CFile',
		),
		'phpThumb'=>array(
			'class'=>'application.extensions.EPhpThumb.EPhpThumb',
			'options'=>array(''),
		),
		'viewRenderer' => array(
			'class' => 'application.vendor.yiiext.twig-renderer.ETwigViewRenderer',
			'twigPathAlias' => 'application.vendor.twig.twig.lib.Twig',
			// All parameters below are optional, change them to your needs
			'fileExtension' => '.html',
			'options' => array(
				'autoescape' => true,
			),
			'extensions' => array(
				'Twig_Extension_JagungBakar',
				'Twig_Extension_StringLoader'
			),
			'globals' => array(
				'html' => 'CHtml'
			),
			'functions' => array(
				'rot13' => 'str_rot13',
			),
			'filters' => array(
				'jencode' => 'CJSON::encode',
				'dump'=> 'var_dump',
				'htmlspecialchars_decode'=>'htmlspecialchars_decode',
			),
		),
	),
	'params'=>require(dirname(__FILE__).'/params.php'),
);
