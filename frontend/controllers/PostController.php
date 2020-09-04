<?php


namespace frontend\controllers;



use common\models\Comment;
use frontend\models\Post;
use common\models\User;
use yii\data\Sort;

use yii\db\Expression;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\data\Pagination;

use yii;




class PostController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['save', 'update', 'delete','view'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['save', 'update', 'delete','view'],
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],

                ]
            ]
        ];
    }

    public function actionSave()
    {

        $model = new Post();
        $model->user_id = Yii::$app->user->getId();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return  $this->redirect(['post/view', 'id'=>$model->id]);
        }else{
            return $this->render('create', ['model'=>$model]);
        }
    }



    public function actionView()
    {
        $id = Yii::$app->request->get('id');//получить id поста
        $post = Post::findOne($id);
        if($post == null){
            throw new yii\web\NotFoundHttpException();

        }
        $modelComment=new Comment();
        $modelComment->post_id=$id;
        $modelComment->user_id=Yii::$app->user->getId();
        $sort = new Sort([
            'attributes'=>[
                'created_at' =>[
                    'asc' =>['created_at'=>SORT_ASC],
                    'desc' =>['created_at'=>SORT_DESC],
                    'label' =>'created_at',
                ]
            ]
        ]);
        $comments = $post->getComments()->orderBy($sort->orders)->all();
        //найденные и отсортированные комментарии

        if($modelComment->load(Yii::$app->request->post())&& $modelComment->save()){

            $post->updateCounters(['comment_counter'=>1]);
           return $this->refresh();
        };




       // $countComments = Comment::find()->where(['post_id'=> $id])->count();//тратит больше памяти
        return $this->render('view',[
            'post'=>$post,
            'modelComment'=>$modelComment,
            'comments' => $comments,
            'sort'=> $sort,

          //  'countComments'=> $countComments,

        ]);

    }
    public function actionUpdate(){
        $id = Yii::$app->request->get('id');//получить id поста
        $post = Post::findOne($id);

        if(Yii::$app->user->getId() === $post->user->id){
            if($post->load(Yii::$app->request->post())&& $post->save()){
                return  $this->redirect(['post/view', 'id'=>$post->id]);
            } else{
                return $this->render('create',['model'=>$post]);
            }
        }else{
            throw new yii\web\NotFoundHttpException('какая-то хрень');
        }


     }

//    public function actionDelete()
//    {
//        $id = Yii::$app->request->get('id');//получить id поста
//
//            $post = Post::findOne($id);
//        if($post!==null){
//            if( Yii::$app->user->getId() === $post->user->id){
//                if(Yii::$app->request->get('isPushed')&& $post->delete()){
//                    return $this->redirect(['site/index']);
//
//                }else{
//                    return $this->render('delete',['post'=>$post,'id'=>$post->id]);
//                }
//
//            }
//        }else{
//          throw new yii\web\NotFoundHttpException();
//        }
//
//    }


    public function actionDelete()
    {
        $id = Yii::$app->request->get('id');//получить id поста

        $post = Post::findOne($id);
        if($post==null){
            throw new yii\web\NotFoundHttpException();
        }

        $currentUserId = Yii::$app->user->getId();
        if ($currentUserId !== $post->user->id) {
            throw new yii\web\NotFoundHttpException();
        }
        if(Yii::$app->request->get('isPushed')&& $post->softDelete()){

                    return $this->redirect(['site/index']);

                }else{
                    return $this->render('delete',['post'=>$post,'id'=>$post->id]);
                }

    }

}