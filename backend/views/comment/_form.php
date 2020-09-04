<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php if($model->isNewRecord &&$model->update()):?>
    <?= $form->field($model, 'id')->textInput() ?>
    <?php endif;?>
    <?= $form->field($model, 'post_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
