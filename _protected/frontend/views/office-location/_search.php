<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OfficeLocationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="officelocations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'OFFICE_LOCATION_ID') ?>

    <?= $form->field($model, 'STREET_ADDRESS') ?>

    <?= $form->field($model, 'CITY') ?>

    <?= $form->field($model, 'STATE') ?>

    <?= $form->field($model, 'ZIP') ?>

    <?php // echo $form->field($model, 'PHONE') ?>

    <?php // echo $form->field($model, 'FAX') ?>

    <?php // echo $form->field($model, 'BRANCH_NUMBER') ?>

    <?php // echo $form->field($model, 'COMPANY_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
