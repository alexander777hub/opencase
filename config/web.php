<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language' => 'ru',
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'mng' => [
            'class' => 'app\modules\mng\Module',
            'layout' => '//manager',
            ],

            'user' => [
            //'class' =>'app\modules\user\Module',
            'class' => 'dektrium\user\Module',
            //'admins' => [getenv("APP_ADMIN_NAME")],
            'modelMap' => [
                 'RegistrationForm' => 'app\models\RegistrationForm',
                 'User'             => 'dektrium\user\models\User',
                 'Profile'          => 'app\models\Profile',
                //  'SettingsForm' => 'app\models\SettingsForm',
            ],
            'controllerMap' => [
                'settings' => 'app\controllers\SettingsController',
                 'registration' => 'app\controllers\RegistrationController',
                'admin' => [
                    'class' => 'dektrium\user\controllers\AdminController',
                    'layout' => '//admin',
                ],
                //    'security' => 'app\controllers\SecurityController',
            ],
            'adminPermission' => 'administrator',
        ],
        'photo_module' => [
            'class' => 'app\modules\photo_module\Module',
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
    ],
    'components' => [
       /* 'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 8,
        ], */
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => ' ',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user',
//                    '@app/vendor/bupy7/yii2-pages/src/views' => '@app/views/bupy7',
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'c6-4hajpzzcAxnszAfSD8iqQrPu8CuqW',
        ],

        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            //            'defaultRoles' => ['admin', 'viewer'],
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity',
                'httpOnly' => false,
                'domain' => '.' . $params['domain'],
            ],
            'loginUrl' => ['/user/security/login'],
        ],
        'authManager'=>[
            'class' => 'dektrium\rbac\components\DbManager',
            'defaultRoles' => ['user'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],*/
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'mail.up-drop.ru',
                    'username' => getenv('APP_MAILER_USERNAME'),
                    'password' => getenv('APP_MAILER_PASSWORD'),
                    'port' => 465,
                    'encryption' => 'ssl',
                    'streamOptions' => [
                        'ssl' => [
                            'verify_peer' => false,
                            'verify_peer_name' => false,

                        ]
                    ],
             ],
            'enableSwiftMailerLogging' =>false,
            'useFileTransport' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'mng'  => '/mng/userform/index',
            ],

        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
