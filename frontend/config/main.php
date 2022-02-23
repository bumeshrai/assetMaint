<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'name'=>'CMRL Asset Maintenance',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
    /*
        'user' => [
            // following line will restrict access to admin page
            'as frontend' => 'dektrium\user\filters\FrontendFilter',
        ],
    */
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'authTimeout' => 60*15,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];
