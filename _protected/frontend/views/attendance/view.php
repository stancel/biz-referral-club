<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ATTENDANCE */

$this->title = $model->ATTENDANCE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Attendances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ATTENDANCE_ID' => $model->ATTENDANCE_ID, 'MEMBER_ID' => $model->MEMBER_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ATTENDANCE_ID' => $model->ATTENDANCE_ID, 'MEMBER_ID' => $model->MEMBER_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ATTENDANCE_ID',
            'MEMBER_ID',
            'MEETING_ID',
        ],
    ]) ?>

</div>
