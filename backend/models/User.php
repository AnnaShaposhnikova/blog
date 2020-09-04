<?php


namespace backend\models;


use common\traits\Restore;
use common\traits\SoftDelete;
use backend\models\Post;
use yii\validators\EmailValidator;
use yii\validators\UniqueValidator;


class User extends \common\models\User
{
    use SoftDelete;
    use Restore;

    public function rules()
    {
        return [
            [['first_name','last_name', 'email', 'password','role'],'required'],
            [['user_id','comment_counter','id'],'integer'],
            ['password','string','min'=>4],
            [['first_name','last_name'], 'string', 'length' => [4, 24]],
            [['email'],EmailValidator::class],
            [['email'],UniqueValidator::class,'targetClass'=>User::class,'targetAttribute'=>'email'],
            //targetAttribute столбец в бд, по которому осущ. проверка на уникальность
        ];
    }




}