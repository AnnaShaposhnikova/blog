<?php


namespace backend\controllers;


use backend\models\PostSearch;

use yii\base\Model;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;
use backend\models\Post;

class PostController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }



    public function actionView($id){
        $model = $this->findModel($id);
        return $this->render('view',['model'=>$model]);

    }



    public function actionCreate(){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $model = new Post;
        $model->user_id = Yii::$app->user->getId();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    public function actionUpdate($id){
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }else{
            return $this->render('update',['model'=>$model]);
        }

    }

    public function actionDelete($id){
        $model = $this->findModel($id);

         $model->softDelete();
        return $this->redirect(['index']);

    }
    public function actionIndex(){
        $searchModel = new PostSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }


    protected function findModel($id){
        $model = Post::findOne($id);
        if($model==null){
            throw new \yii\web\NotFoundHttpException();
        }
            return $model;

}
    public function actionDeleteForever($id){

        $model = $this->findModel($id);

        $model->delete();
        return $this->redirect(['index','id'=>$model->id]);

    }

    public function actionRestore($id){
        $model = $this->findModel($id);
        $model->restore();
        return $this->redirect(['index','id'=>$model->id]);

    }


}