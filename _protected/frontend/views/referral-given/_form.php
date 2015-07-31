<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//use yii\bootstrap\Collapse;

use frontend\models\REFERRALS;

//Need to add these namespaces for the dropdown of the foreign key
use yii\helpers\ArrayHelper;
use frontend\models\MEETINGS;
use frontend\models\MEMBERS;


/* @var $this yii\web\View */
/* @var $model app\models\REFERRALGIVEN */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="referralgiven-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= //$form->field($model, 'MEMBER_ID')->textInput() 
        // Need to filter this for current members only (IS_ACTIVE)
        $form->field($model, 'MEMBER_ID')->dropDownList(ArrayHelper::map(
                MEMBERS::find()->all(), 'MEMBER_ID', 'FIRST_NAME'),['prompt'=>'---Choose a Member---'])->label('Member Recipient');  
    ?>

    <?= $form->field($model, 'GIVEN_YOUR_CARD')->dropDownList([ 'TRUE' => 'TRUE', 'FALSE' => 'FALSE', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'TOLD_THEM_YOU_WOULD_CALL')->dropDownList([ 'TRUE' => 'TRUE', 'FALSE' => 'FALSE', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'COMMENTS')->textarea(['rows' => 6]) ?>

    <?= //$form->field($model, 'MEETING_ID')->textInput() 
        $form->field($model, 'MEETING_ID')->dropDownList(ArrayHelper::map(MEETINGS::find()->all(), 'MEETING_ID', 'DATE_AND_TIME'),['prompt'=>'---Choose a Meeting Date---']);          
    ?>

    
    <?= $form->field($referralModel, 'REFERRAL_NAME')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($referralModel, 'ADDRESS')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($referralModel, 'CITY')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($referralModel, 'STATE')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($referralModel, 'ZIP')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($referralModel, 'EMAIL')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($referralModel, 'PHONE')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($referralModel, 'COMMENTS')->textarea(['rows' => 6]) ?>
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
