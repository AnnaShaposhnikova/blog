<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            'email:email',


            [
                'class' => 'yii\grid\ActionColumn',
                'template'=> '{view} {update} {delete} {deleteForever} {restore}',
                'buttons'=>[
                    'deleteForever' => function ($url, $model, $key) {
                        return  Html::a(Html::tag('span','',[
                            'class'=>'glyphicon glyphicon-trash',
                            'style'=>'color:red']), $url);

                    },
                    'restore' => function ($url, $model, $key) {
                        return Html::a(Html::tag('span','',['class'=>'glyphicon glyphicon-repeat']), $url);
                    },

                ],
                'visibleButtons'=>[
                    'delete' => function ($model, $key, $index) {


                        return $model->email !== 'admin@admin.com';
                    }
                    ,
                    'deleteForever' => function ($model, $key, $index) {

                        return ($model->email !== 'admin@admin.com' && $model->deleted_at !== null);
                    }
                    ,
                    'restore'=>function ($model, $key, $index) {

                        return $model->deleted_at !== null;
                    }

                ],

            ],
        ],
    ]); ?>


</div>
