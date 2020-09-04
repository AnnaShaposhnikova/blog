<?php

namespace common\components;

use common\models\User;
use Yii;
use yii\rbac\Rule;

class UserRoleRule extends Rule
{
    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
        if (!Yii::$app->user->isGuest) {
            $group = Yii::$app->user->identity->role;
            if($item->name === 'admin'){
                return $group == User::ADMIN_ROLE;
            } elseif ($item->name === 'user'){
                return $group == User::USER_ROLE || $group == User::ADMIN_ROLE;
            }
            return false;
        }
    }
}