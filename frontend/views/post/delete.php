<?php
use yii\helpers\Html;
use yii\helpers\Url;
/**@var \frontend\models\Post $post */
?>

<div>
    <h1>Вы уверены?</h1>
</div>
<a href="<?=Url::to(['post/view','id'=>$post->id])?>">Вернуться назад</a>
<div>

</div>
<?php if(Yii::$app->user->getId() === $post->user->id):?>
<div class="col-lg-offset-1 col-lg-11">
    <?= Html::a('Удалить', ['post/delete','id'=>$post->id,'isPushed'=>true],['class' => 'btn btn-danger','id'=>$post->id]) ?>
</div>
<?php endif;?>
