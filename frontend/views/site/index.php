<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/** @var \frontend\models\Post $posts */
/** @var \frontend\models\Post $pages */
/**@var \common\models\User $currentUser*/
/**@var \frontend\models\ActiveDataProvider $dataProvider */
/**  @var \frontend\models\Post $lastPosts */
/** @var \frontend\models\Comment $lastComments */
/**  @var \frontend\models\Post $discussed */
$this->title = 'My Posts';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">Welcome to blog!.</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-md-8">
                <h2>Posts</h2>
                <?=ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_post',
                ]);?>


            </div>
            <div class = "col-md-4">
                <div class="row-1">
                    Последние статьи:
                    <?php foreach ($lastPosts as $post):?>
                        <p><?=$post->title?></p>
                    <?php endforeach; ?>

                </div>
                <div class="row-1">
                    Последние комментарии:
                    <?php foreach ($lastComments as $comment):?>
                        <p><?=$comment->comment?></p>
                    <?php endforeach; ?>
                </div>
                <div class="row-1">
                    Самые обсуждаемые статьи:
                    <?php foreach ($discussed as $post):?>
                        <p><?=$post->title?></p>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
        <div>
            <?php if($currentUser):?>

                <a href="<?=Url::to('post/save')?>">Create post</a>
            <?php endif;?>
        </div>

    </div>

</div>

<style scoped>
    .col-md-8   {
        border: 1px solid white;
        background: #00FA9A;
        text-align: left;
        padding-top: 8px;
        padding-bottom: 8px;
    }
    .col-md-4 {
        border: 1px solid white;
        background: #20B2AA;
        text-align: left;
        padding-top: 8px;
        padding-bottom: 8px;

    }
    .row-1 {
        border: 1px solid white;
        background: #F5DEB3;
        text-align: left;
        padding-top: 8px;
        padding-bottom: 8px;
    }
</style>

