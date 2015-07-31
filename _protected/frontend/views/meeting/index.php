<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MeetingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meetings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meetings-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Meetings', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    
    
    <?php if(Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif; ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'MEETING_ID',
            'MEETING_PLACE',
            //'DATE_AND_TIME',
            [   
                // This is the best way, but requires method in model class
                'attribute'=>'DATE_AND_TIME',
                'format'=>['date', 'MM/dd/yyyy hh:mm a'],
                //'type'=>DetailView::INPUT_DATE, 
//                'value'=>$model->convertDate($model->DATE_AND_TIME),
            ],
//            'CREATED_TIME',
            [   
                // This is the best way, but requires method in model class
                'attribute'=>'CREATED_TIME',
                'format'=>['date', 'MM/dd/yyyy hh:mm a'],
                //'type'=>DetailView::INPUT_DATE, 
//                'value'=>$model->convertDate($model->DATE_AND_TIME),
            ],
//            'LAST_UPDATED_TIME',
            [   
                // This is the best way, but requires method in model class
                'attribute'=>'LAST_UPDATED_TIME',
                'format'=>['date', 'M/d/yyyy h:m a'],
                //'type'=>  kartik\datecontrol\DateControl::FORMAT_DATETIME, 
//                'value'=>$model->convertDate($model->DATE_AND_TIME),
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
