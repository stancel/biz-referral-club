<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\REFERRALRECEIVED */

$this->title = $model->RECEIVED_ID;
$this->params['breadcrumbs'][] = ['label' => 'Referralreceiveds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referralreceived-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->RECEIVED_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->RECEIVED_ID], [
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
            'RECEIVED_ID',
            'MEMBER_ID',
            'REFERRAL_ID',
            'COMMENTS:ntext',
        ],
    ]) ?>

</div>
