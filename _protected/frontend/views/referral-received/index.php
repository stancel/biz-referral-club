<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReferralReceivedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Referralreceiveds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referralreceived-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Referralreceived', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'RECEIVED_ID',
            'MEMBER_ID',
            'REFERRAL_ID',
            'COMMENTS:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
