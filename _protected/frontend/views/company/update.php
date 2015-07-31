<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\COMPANIES */

$this->title = 'Update Companies: ' . ' ' . $model->COMPANY_ID;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->COMPANY_ID, 'url' => ['view', 'id' => $model->COMPANY_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="companies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'officeLocation' => $officeLocation,
    ]) ?>

</div>
