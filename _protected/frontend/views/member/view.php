<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MEMBERS */

$firstName = $model->FIRST_NAME;
$lastName = $model->LAST_NAME;
$fullName = $firstName.' '.$lastName;


$this->title = $fullName;
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->MEMBER_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->MEMBER_ID], [
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
            //'MEMBER_ID',
            //'IMAGE_FILENAME_ON_SERVER',
            [
                'label' => 'Photo Label',
                'value'=>Yii::$app->urlManager->baseUrl.'/uploads/'.$model->IMAGE_FILENAME_ON_SERVER,
                'format' => ['image',['width'=>'62','height'=>'62']],
            ],
            'FIRST_NAME',
            'LAST_NAME',
            'PHONE_NUMBER',
            'POSITION',
            'IS_ACTIVE',
            'EMAIL_ADDRESS:email',
            'PASSWORD',
            'JOINED_DATE',
            'LEFT_DATE',
            //'COMPANY_ID', 
             [
                'label' => 'Company',
                'value' => $model->cOMPANY->COMPANY_NAME,
             ]
        ],
    ]) ?>

</div>
