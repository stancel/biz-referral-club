<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Members';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Members', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MEMBER_ID',
            'FIRST_NAME',
            'LAST_NAME',
            'PHONE_NUMBER',
            'POSITION',
            // 'IS_ACTIVE',
            // 'EMAIL_ADDRESS:email',
            // 'PASSWORD',
            // 'JOINED_DATE',
            // 'LEFT_DATE',
            // 'COMPANY_ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
