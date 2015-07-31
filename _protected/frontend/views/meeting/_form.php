<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\widgets\DatePicker;

use kartik\datecontrol\DateControl;

use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\MEETINGS */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meetings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MEETING_PLACE')->textInput(['maxlength' => 75]) ?>
    
    <?=    
        $form->field($model, 'DATE_AND_TIME')->widget(DateControl::classname(), [
            'type'=>DateControl::FORMAT_DATETIME,
            'ajaxConversion'=>true,
            'options' => [
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]
        ]);
    ?>
    

    
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
