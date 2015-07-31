<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\REFERRALGIVEN */

$this->title = 'Give a Referral';
$this->params['breadcrumbs'][] = ['label' => 'Referralgivens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referralgiven-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'referralModel' => $referralModel
    ]) ?>

</div>
