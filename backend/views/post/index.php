<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'content',
            'deleted_at',


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {delete-forever} {restore}',
                'buttons' => [
                    'delete-forever' => function ($url, $model, $key) {
                        return Html::a(Html::tag('span', '', [
                            'class' => 'glyphicon glyphicon-trash',
                            'style' => 'color:red',
                        ]), $url, [
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item forever?',
                                'method' => 'post',
                            ]
                        ]);

                    },
                    'restore' => function ($url, $model, $key) {
                        return Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-repeat']), $url);
                    },

                ],
                'visibleButtons' => [
                    'delete' => function ($model, $key, $index) {


                        return $model->deleted_at == null;
                    }
                    ,

                    'delete-forever' => function ($model, $key, $index) {


                        return $model->deleted_at !== null;
                    },


                    'restore' => function ($model, $key, $index) {

                        return $model->deleted_at !== null;
                    }

                ],


            ],
        ],
    ]); ?>


</div>
