<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;


/* @var $this yii\web\View */
/* @var $model app\models\MEETINGS */

$this->title = $model->MEETING_ID;
$this->params['breadcrumbs'][] = ['label' => 'Meetings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meetings-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->MEETING_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->MEETING_ID], [
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
            'MEETING_ID',
            'MEETING_PLACE',
            //'DATE_AND_TIME',
            [   
                // This is the best way, but requires method in model class
                'attribute'=>'DATE_AND_TIME', 
                //'type'=> DateControl::FORMAT_DATETIME, 
                'value'=>$model->convertDate($model->DATE_AND_TIME)
            ],
            [
                'attribute'=>'DATE_AND_TIME', 
                'format'=>['date', 'MM/dd/yyyy hh:mm a'],
                'type'=>DateControl::FORMAT_DATETIME, // enables you to use any widget
//                'widgetOptions'=>[
//                    'class'=>DateControl::classname(),
//                    'type'=>DateControl::FORMAT_DATE
//                ]
            ],
            //'CREATED_TIME',
            [
                'attribute'=>'CREATED_TIME', 
                'format'=>['date', 'MM/dd/yyyy hh:mm a'],
//                'type'=>DetailView::INPUT_WIDGET, // enables you to use any widget
//                'widgetOptions'=>[
//                    'class'=>DateControl::classname(),
//                    'type'=>DateControl::FORMAT_DATETIME
//                ],
            ],
            'LAST_UPDATED_TIME',
            [
                'attribute'=>'LAST_UPDATED_TIME', 
                'format'=>['date', 'MM/dd/yyyy hh:mm a'],
                'type'=>  DateTime::class,
//                'type'=>DetailView::INPUT_WIDGET, // enables you to use any widget
//                'widgetOptions'=>[
//                    'class'=>DateControl::classname(),
//                    'type'=>DateControl::FORMAT_DATETIME
//                ],
            ],
            
        ],
    ]) ?>

</div>
