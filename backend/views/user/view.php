<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

    </p>
    <?php
    if($model->role ==1){
    echo 'user';
    }elseif($model->role == 2){
    echo 'admin';
    }else{
    echo 'Unknown role';
    }
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'first_name',
            'last_name',
            'email:email',
//          'password',
            'role',

            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
