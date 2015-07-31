<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\REFERRALGIVEN */

$this->title = $model->GIVEN_ID;
$this->params['breadcrumbs'][] = ['label' => 'Referralgivens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referralgiven-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->GIVEN_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->GIVEN_ID], [
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
            //'GIVEN_ID',
            //'MEMBER_ID',
            [
                'label' => 'Passed Refferal To:',
                'value' => $model->mEMBER->FIRST_NAME.' '.$model->mEMBER->LAST_NAME,
            ],
            [
                'label' => 'Referral Name:',
                'value' => $model->rEFERRAL->REFERRAL_NAME,
            ],
            //'REFERRAL_ID',
            'GIVEN_YOUR_CARD',
            'TOLD_THEM_YOU_WOULD_CALL',
            'COMMENTS:ntext',
            //'MEETING_ID',
            [
                'label' => 'Gave Referral at Meeting:',
                'value' => $model->mEETING->DATE_AND_TIME,
            ],
        ],
    ]) ?>

</div>
