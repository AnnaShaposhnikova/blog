<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php if($model->isNewRecord && $model->update()):?>
    <?= $form->field($model, 'id')->textInput() ?>
    <?php endif;?>
    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php if($model->isNewRecord):?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    <?php endif;?>

    <?= $form->field($model, 'role')->dropDownList([1=>'user',2=>'admin'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
