<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OfficeLocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Officelocations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="officelocations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Officelocations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'OFFICE_LOCATION_ID',
            'STREET_ADDRESS',
            'CITY',
            'STATE',
            'ZIP',
            // 'PHONE',
            // 'FAX',
            // 'BRANCH_NUMBER',
            // 'COMPANY_ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
