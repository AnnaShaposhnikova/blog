<?php


namespace frontend\controllers;


use frontend\models\Post;
use common\models\User;
use yii\filters\AccessControl;

use yii\web\Controller;
use yii;

class UserController extends Controller
{

    public function behaviors(){
        return [
            'access'=>[
                'class'=>AccessControl::className(),
                'only'=>['profile'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['profile'],
                        'roles' => ['@'],
                    ],

                ]

            ]
        ];
    }

    public function actionProfile()
    {
        $currentUserId=Yii::$app->user->getId();//id залогиненого юзера
        $user=User::findOne($currentUserId);

        $posts = Post::findAll(['user_id'=>$currentUserId]);


        return $this->render('profile',['user' => $user,'posts'=>$posts]);

    }
}