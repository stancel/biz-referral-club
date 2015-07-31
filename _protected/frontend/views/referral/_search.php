<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReferralSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="referrals-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'REFERRAL_ID') ?>

    <?= $form->field($model, 'REFERRAL_NAME') ?>

    <?= $form->field($model, 'ADDRESS') ?>

    <?= $form->field($model, 'CITY') ?>

    <?= $form->field($model, 'STATE') ?>

    <?php // echo $form->field($model, 'ZIP') ?>

    <?php // echo $form->field($model, 'EMAIL') ?>

    <?php // echo $form->field($model, 'PHONE') ?>

    <?php // echo $form->field($model, 'COMMENTS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
