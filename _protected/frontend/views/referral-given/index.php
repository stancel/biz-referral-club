<?php

use yii\helpers\Html;
use yii\grid\GridView;

//use yii\helpers\ArrayHelper;
//use app\models\COMPANIES;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ReferralGivenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Referralgivens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referralgiven-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Referralgiven', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'GIVEN_ID',
            'MEMBER_ID',
            //'REFERRAL_ID',
            [
                'label' => 'Referral Name2:',
                'attribute'=>'referralName',
//                'filter'=>$authorList,
            ],
            'referralName',
            'GIVEN_YOUR_CARD',
            'TOLD_THEM_YOU_WOULD_CALL',
            // 'COMMENTS:ntext',
            // 'MEETING_ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
