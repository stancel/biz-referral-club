<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ATTENDANCE */

$this->title = 'Update Attendance: ' . ' ' . $model->ATTENDANCE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Attendances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ATTENDANCE_ID, 'url' => ['view', 'ATTENDANCE_ID' => $model->ATTENDANCE_ID, 'MEMBER_ID' => $model->MEMBER_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attendance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
