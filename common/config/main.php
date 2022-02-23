<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
    /*
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableGeneratingPassword' => true,
            'enableUnconfirmedLogin' => true,
            'enableConfirmation' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['cgmei'],
            'mailer' => [
                    'sender'                => 'no-reply@cmrlVent.in', // or ['no-reply@myhost.com' => 'Sender name']
                    'welcomeSubject'        => 'Welcome subject',
                    'confirmationSubject'   => 'Confirmation subject',
                    'reconfirmationSubject' => 'Email change subject',
                    'recoverySubject'       => 'Recovery subject',
            ],
        ],
    */
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'formatter' => [
		    'class' => 'yii\i18n\Formatter',
		    'defaultTimeZone' => 'UTC',
       		'timeZone' => 'Asia/Kolkata',
		    'dateFormat' => 'php:d-M-Y',
		    'datetimeFormat' => 'php:d-M-Y H:i:s',
		    'timeFormat' => 'php:H:i:s',
		],
    ],
];
