<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Property lk',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
            'caseSensitive'=>false,
			'rules'=>array(
                '' => 'site/index',
                'login' => 'site/login',
                'register' => 'site/register',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=mypropertylk',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
        //-------Paypal Component--------
        'Paypal' => array(

            'class'=>'application.components.Paypal',

            /*@TODO uncomment Live PAYPAL lines and comment Testing Sandbox PAYPAL lines to go live*/

            /*---( Live PAYPAL )---*/
/*          'apiUsername' => 'info_api1.emodelslanka.com',
            'apiPassword' => 'UTJB9CG7CM8RB87Z',
            'apiSignature' => 'AuunftkSDTd4USVDhV6Hy-lfyeCzANdQU0bstigeJS5SRcmGWDvFxajY',*/

            /*---( Testing Sandbox PAYPAL )---*/
            'apiUsername' => 'info-facilitator_api1.emodelslanka.com',
            'apiPassword' => '1382410898',
            'apiSignature' => 'AiPC9BjkCyDFQXbSkoZcgqH3hpacAxDvKPXbNISSx77OwH.6JtUWLWr-',

            'apiLive' => false,

            'returnUrl' => 'paypal/confirm/', //regardless of url management component
            'cancelUrl' => 'paypal/cancel/', //regardless of url management component
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in detail page
        'adminEmail'=>'info@myproperty.lk',
        'mailCC_1'=>'emodels@gmail.com',
        'SMTP_Host'=>'just110.justhost.com',
        'SMTP_Port'=>'465',
        'SMTP_Username'=>'info@myproperty.lk',
        'SMTP_password'=>'info@mypropertylk',
        'SMTPSecure'=>TRUE,
        'SMTPDebug'=>true
    ),
);