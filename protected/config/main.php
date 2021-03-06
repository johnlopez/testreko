<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
        'theme'=>"metroui",  

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
                'usuario',
                'aula',
                'repositorio',
                'escritorio_usuario',
                'perfil',

		
	),

	// application components
	'components'=>array(
                'session' => array (
                    'class' => 'system.web.CDbHttpSession',
                    'connectionID' => 'db',
                    'sessionTableName' => 'reko_session',

                ),
                'Validar' => array(
                    'class'=>'application.components.Validar',
                ),
                'InstitucionComponent'=>array(
                    "class"=>'application.components.InstitucionComponent',
                ),
                'ArchivoComponent'=>array(
                    "class"=>'application.components.ArchivoComponent',
                ),
                'authManager'=>array(
                    "class"=>"CDbAuthManager",
                    "connectionID"=>"db",
                    'itemTable'=>'authitem_permiso_usuario', // Tabla que contiene los elementos de autorizacion rol_institucion
                    'assignmentTable'=>'authassignment_usuario', // Tabla que contiene la asignacion usuario_rol_administrador
                    'itemChildTable'=>'authitemchild_usuario', // Tabla que contiene los elementos padre-hijo                    
                ),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
                        'showScriptName'=>false,
			'urlFormat'=>'path',
			'caseSensitive'=>true,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

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
				
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),
		
//		'request' => array(
//            'baseUrl' => '/rekotest/testreko',
//		),

	),
    
        //'onException' => array('ErrorHandler', 'handleException'),
        //'onError' => array('ErrorHandler', 'handleError'),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
                'rutaArchivos'=>'C:/wamp/www/testreko',//Yii::app()->params[$rutaArchivos];
	),
);
