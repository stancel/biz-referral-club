<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OFFICELOCATIONS */

$this->title = $model->cOMPANY->COMPANY_NAME;
//$this->title = $model->OFFICE_LOCATION_ID;
$this->params['breadcrumbs'][] = ['label' => 'Office Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="officelocations-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->OFFICE_LOCATION_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->OFFICE_LOCATION_ID], [
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
            //'COMPANY_ID',
            [
                'label' => 'Company',
                'value' => $model->cOMPANY->COMPANY_NAME,
            ],
            //'OFFICE_LOCATION_ID',
            'STREET_ADDRESS',
            'CITY',
            'STATE',
            'ZIP',
            'PHONE',
            'FAX',
            'BRANCH_NUMBER',
            
        ],
    ]) ?>

</div>
