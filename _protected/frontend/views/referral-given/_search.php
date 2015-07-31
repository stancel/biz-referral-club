<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReferralGivenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="referralgiven-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'GIVEN_ID') ?>

    <?= $form->field($model, 'MEMBER_ID') ?>

    <?= $form->field($model, 'REFERRAL_ID') ?>

    <?= $form->field($model, 'GIVEN_YOUR_CARD') ?>

    <?= $form->field($model, 'TOLD_THEM_YOU_WOULD_CALL') ?>

    <?php // echo $form->field($model, 'COMMENTS') ?>

    <?php // echo $form->field($model, 'MEETING_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
