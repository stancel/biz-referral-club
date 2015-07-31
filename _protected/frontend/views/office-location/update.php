<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OFFICELOCATIONS */

$this->title = 'Update Officelocations: ' . ' ' . $model->OFFICE_LOCATION_ID;
$this->params['breadcrumbs'][] = ['label' => 'Officelocations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->OFFICE_LOCATION_ID, 'url' => ['view', 'id' => $model->OFFICE_LOCATION_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="officelocations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
