<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
            'enableStrictParsing' => true,


            'rules' => [
                ''=>'site/index',
                'login'=>'site/login',
                'logout'=>'site/logout',
                'user' => 'user/index',
                'user/create' => 'user/create',
                'user/view'=>'user/view',
                'user/update' => 'user/update',
                'user/delete' => 'user/delete',
                'user/delete-forever'=>'user/delete-forever',
                'user/restore'=>'user/restore',
                'post' => 'post/index',
                'post/view'=>'post/view',
                'post/create' => 'post/create',
                'post/update' => 'post/update',
                'post/delete' => 'post/delete',
                'post/delete-forever'=>'post/delete-forever',
                'post/restore'=>'post/restore',
                'comment' => 'comment/index',
                'comment/view'=>'comment/view',
                'comment/create' => 'comment/create',
                'comment/update' => 'comment/update',
                'comment/delete' => 'comment/delete',
                'comment/delete-forever'=>'comment/delete-forever',
                'comment/restore'=>'comment/restore',

            ],

        ],
    ],
    'params' => $params,

];
