<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['user', 'admin'],
            'itemFile'=>'@console/rbac/items.php',
            'assignmentFile'=>'@console/rbac/assignments.php',
            'ruleFile'=>'@console/rbac/rules.php',
        ],


    ],
];
