<?php
use yii\helpers\Url;
use yii\helpers\Html;

/** @var \common\models\User $user */
/** @var \frontend\models\Post $posts */
?>
<div class="container">
    <div class="row">
        <div class="col-xs-4"  >
            <div class="col-xs-4 ">
                <?=$user->first_name." ". $user->last_name?>
            </div>

        </div>


        <div class="col-xs-8 border">
            <div class="row">
            <h2>My posts</h2>

            <?php foreach($posts as $post):?>
                    <p class="row">
                <p class="pull-left">

                    <a href="<?=Url::to(['post/view','id'=>$post->id])?>"><?=$post->title?></a>
                </p>
                        <p class="pull-right">
                    <a href="<?=Url::to(['post/update','id'=>$post->id])?>">Редактировать</a>
                </p>
                <p class="pull-right">
                    <?=Html::a('Удалить',['post/delete','id'=>$post->id,'fromProfile'=>true],['class' => 'btn btn-danger','id'=>$post->id])?>
                </p>
            <?php endforeach;?>
                </div>
        </div>
    </div>
</div>

<style>
    .border
    {
        border:1px solid black;
        background: #f5f5f5;
    }
</style>
