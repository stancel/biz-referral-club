<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\REFERRALS */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="referrals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'REFERRAL_NAME')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'ADDRESS')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'CITY')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'STATE')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'ZIP')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'PHONE')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'COMMENTS')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
