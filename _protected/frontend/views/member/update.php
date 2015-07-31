<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MEMBERS */

$this->title = 'Update Members: ' . ' ' . $model->MEMBER_ID;
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MEMBER_ID, 'url' => ['view', 'id' => $model->MEMBER_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="members-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
