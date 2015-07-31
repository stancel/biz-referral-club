<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MeetingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meetings-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'MEETING_ID') ?>

    <?= $form->field($model, 'MEETING_PLACE') ?>

    <?= $form->field($model, 'DATE_AND_TIME') ?>
    
    <?= $form->field($model, 'CREATED_TIME') ?>
    
    <?= $form->field($model, 'LAST_UPDATED_TIME') ?>
    

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
