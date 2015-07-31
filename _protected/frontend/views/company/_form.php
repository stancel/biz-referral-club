<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\COMPANIES */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companies-form">

    <?php $form = ActiveForm::begin(); 
        
    ?>

    <?= $form->field($model, 'COMPANY_NAME')->textInput(['maxlength' => 45]) ?>
    
    <?= $form->field($officeLocation, 'STREET_ADDRESS')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($officeLocation, 'CITY')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($officeLocation, 'STATE')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($officeLocation, 'ZIP')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($officeLocation, 'PHONE')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($officeLocation, 'FAX')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($officeLocation, 'BRANCH_NUMBER')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
