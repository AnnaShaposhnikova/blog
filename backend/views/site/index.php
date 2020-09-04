<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Admin-side</h1>



    <div class="body-content">

        <div class="row">

            <div class="col-lg-4">
                <h2>User</h2>
                <p><a href="<?=Url::to(['user/index']) ?> ">User</a></p>
            </div>
                <div class="col-lg-4">
                    <h2>Post</h2>
                    <p><a href="<?=Url::to(['post/index']) ?> ">Post</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Comment</h2>
                <p><a href = "<?=Url::to(['comment/index'])?>">Comment</a></p>

            </div>
        </div>

    </div>
</div>
