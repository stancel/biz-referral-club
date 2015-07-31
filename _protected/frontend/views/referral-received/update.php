<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\REFERRALRECEIVED */

$this->title = 'Update Referralreceived: ' . ' ' . $model->RECEIVED_ID;
$this->params['breadcrumbs'][] = ['label' => 'Referralreceiveds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->RECEIVED_ID, 'url' => ['view', 'id' => $model->RECEIVED_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="referralreceived-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
