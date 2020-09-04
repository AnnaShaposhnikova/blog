<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="post">
    <a  href="<?=Url::to(['post/view', 'id'=>$model->id])?>"><?=$model->title;?></a>
    <p><?=$model->created_at;?></p>
    <p>Количество комментариев: <?= $model->comment_counter?></p>
</div>
