<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\REFERRALGIVEN */

$this->title = 'Update Referralgiven: ' . ' ' . $model->GIVEN_ID;
$this->params['breadcrumbs'][] = ['label' => 'Referralgivens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->GIVEN_ID, 'url' => ['view', 'id' => $model->GIVEN_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="referralgiven-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
