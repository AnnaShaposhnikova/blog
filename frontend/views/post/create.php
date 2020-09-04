<?php
use yii\helpers\Html;

use yii\widgets\ActiveForm;

$form = ActiveForm::begin([

    'id' => 'post',
    'options' => [
        'class' => 'form-horizontal',
    ],
]) ?>
<?= $form->field($model, 'title') ?>
<?= $form->field($model, 'content')->textarea() ?>

<div class="form-group">
    <?php if($model->isNewRecord):?>
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php else: ?>
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php endif;?>

</div>
<?php ActiveForm::end() ?>