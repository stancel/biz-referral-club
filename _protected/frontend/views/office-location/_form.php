<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


//Need to add these namespaces for the dropdown of the foreign key
use yii\helpers\ArrayHelper;
use frontend\models\COMPANIES;
// End of added namespaces for dropdown of foreign key

/* @var $this yii\web\View */
/* @var $model app\models\OFFICELOCATIONS */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="officelocations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'STREET_ADDRESS')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'CITY')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'STATE')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'ZIP')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'PHONE')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'FAX')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'BRANCH_NUMBER')->textInput(['maxlength' => 45]) ?>

    <?= //$form->field($model, 'COMPANY_ID')->textInput() 
        // This is how you reference a foreign key and display another applicable column in a drop down menu
        $form->field($model, 'COMPANY_ID')->dropDownList(ArrayHelper::map(COMPANIES::find()->all(), 'COMPANY_ID', 'COMPANY_NAME'),['prompt'=>'---Choose a Company---']);   
            
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
