<?php
namespace console\controllers;

use common\components\UserRoleRule;
use yii\console\Controller;
use Yii;

class RbacController extends  Controller
{
    public function actionInit()
    {
        /** @var yii\rbac\PhpManager $auth */
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $rule = new UserRoleRule();
        $auth->add($rule);

        $user = $auth->createRole('user');
        $user->ruleName = $rule->name;
        $auth->add($user);


        $admin = $auth->createRole('admin');
        $admin->ruleName = $rule->name;
        $auth->add($admin);
    }
}