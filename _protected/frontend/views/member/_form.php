<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;

use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;

use yii\bootstrap\Collapse;

use yii\bootstrap\Modal;


use kartik\widgets\DatePicker;


//Need to add these namespaces for the dropdown of the foreign key
use yii\helpers\ArrayHelper;
use frontend\models\COMPANIES;

/* @var $this yii\web\View */
/* @var $model app\models\MEMBERS */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="members-form">

    <?php 
        Modal::begin([
            'header' => '<h2>Hello world</h2>',
            'toggleButton' => ['label' => 'click me'],
        ]);

        echo 'Say hello...';

        Modal::end();
        
    ?>
    
    
    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>

    <?= $form->field($model, 'FIRST_NAME')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'LAST_NAME')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'PHONE_NUMBER')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'POSITION')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'IS_ACTIVE')->dropDownList([ 'TRUE' => 'TRUE', 'FALSE' => 'FALSE', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'EMAIL_ADDRESS')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'PASSWORD')->passwordInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'JOINED_DATE')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd' 
        ]
    ]);        
    ?>


    

    <?= //$form->field($model, 'COMPANY_ID')->textInput() 
        $form->field($model, 'COMPANY_ID')->dropDownList(ArrayHelper::map(COMPANIES::find()->all(), 'COMPANY_ID', 'COMPANY_NAME'),['prompt'=>'-Choose a Company-']);
        
        //This works WITHOUT $model
//      Html::dropDownList('COMPANY_ID', null,ArrayHelper::map(COMPANIES::find()->all(), 'COMPANY_ID', 'COMPANY_NAME'),['prompt' => '---- Choose a Company ----']);

        //This works with $model, but the CSS is off
//      Html::activeDropDownList($model, 'COMPANY_ID',ArrayHelper::map(COMPANIES::find()->all(), 'COMPANY_ID', 'COMPANY_NAME'));        
    ?>
    
    
    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
        'options'=>['accept'=>'image/*'],
        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']] ]) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>
