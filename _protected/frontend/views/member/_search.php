<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MemberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="members-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'MEMBER_ID') ?>

    <?= $form->field($model, 'FIRST_NAME') ?>

    <?= $form->field($model, 'LAST_NAME') ?>

    <?= $form->field($model, 'PHONE_NUMBER') ?>

    <?= $form->field($model, 'POSITION') ?>

    <?php // echo $form->field($model, 'IS_ACTIVE') ?>

    <?php // echo $form->field($model, 'EMAIL_ADDRESS') ?>

    <?php // echo $form->field($model, 'PASSWORD') ?>

    <?php // echo $form->field($model, 'JOINED_DATE') ?>

    <?php // echo $form->field($model, 'LEFT_DATE') ?>

    <?php // echo $form->field($model, 'COMPANY_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
