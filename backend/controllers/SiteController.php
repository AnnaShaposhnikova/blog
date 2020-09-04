<?php
namespace backend\controllers;

use backend\models\User;
use backend\models\UserSearch;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index','logout'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
       if(!Yii::$app->user->isGuest) {
           return $this->goHome();
       }

        $model = new LoginForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

//            $user_id= Yii::$app->user->id;
//            if ( User::findOne($user_id)->email == 'admin@admin.com') {
//                return $this->goHome();
//            }

            if ($model->login()) {
                return $this->goBack();
            }
                } else{
                     $model->password = '';//сброс пароля
            return $this->render('login', [
                'model' => $model,
            ]);
                     return $this->render('notAdmin');




//        $model->password = '';//сброс пароля
//        return $this->render('login', [
//            'model' => $model,
//        ]);
        }




//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        } else {
//            $model->password = '';
//
//            return $this->render('login', [
//                'model' => $model,
//            ]);
//        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
