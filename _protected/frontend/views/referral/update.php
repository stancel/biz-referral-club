<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\REFERRALS */

$this->title = 'Update Referrals: ' . ' ' . $model->REFERRAL_ID;
$this->params['breadcrumbs'][] = ['label' => 'Referrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->REFERRAL_ID, 'url' => ['view', 'id' => $model->REFERRAL_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="referrals-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
