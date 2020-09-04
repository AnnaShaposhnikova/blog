<?php
use yii\helpers\Url;
use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;


/** @var \frontend\models\Post $post */
/**@var \frontend\models\Post $commentCounter */
/** @var \frontend\models\Comment $modelComment */
/**@var \frontend\models\Comment $countComments */
/**@var \frontend\models\Comment $comments */
/**@var \frontend\models\Comment $sort */

?>

<div class="container">
    <div class="row">
        <div>
              <h1><?=$post->title?></h1>
        </div>


        <div>
            Автор:<?=$post->user->first_name.' '.$post->user->last_name?>
        </div>
        <div>
            Количество комментариев: <?=$post->comment_counter ?>
<!--            Количество комментариев:--><?//=$countComments?>
        </div>

        <div>


            Дата публикации:<?=Yii::$app->formatter->asDate($post->created_at)?>
        </div>
        <div>
            <?=$post->content?>
        </div>
    </div>
</div>


        <?php if($modelComment->user_id):?>
        <div >
            <?php
            $form = ActiveForm::begin([
                'id' => 'comment',
                'enableAjaxValidation' => false,
                'options' => [
                        'data' => ['pjax' => true],
                    'class' => 'form-horizontal',
                ],
            ])

            ?>
            <div>
                <?=$form->field($modelComment,'comment')?>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Комментировать', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>
        </div>
        <?php endif;?>
<div>

</div>


        <div>
            <?=$sort->link('created_at')?>
            <?php foreach ($comments as $comment):?>
            <div class="container">
            <div class="row">
                <div class="col-6">
                    <?=$comment->created_at?>
                </div>
                <div class="col-6">
                    <?=$comment->user->first_name.' '.$comment->user->last_name?>
                </div>
            </div>
                <div class="row">
                    <?=$comment->comment?>
                </div>
            </div>
            <p></p>
            <?php endforeach;?>
        </div>


<?php if($post->user->id === Yii::$app->user->getId()):?>
    <a href="<?= Url::to(['post/update','post'=>$post, 'id'=>$post->id])?>"> Update post</a>
<br>
    <?= Html::a('Удалить пост',['post/delete','id'=>$post->id],['class' => 'btn btn-danger'])?>

<?php endif;?>













