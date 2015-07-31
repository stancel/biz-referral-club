<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\REFERRALS */

$this->title = 'Create Referrals';
$this->params['breadcrumbs'][] = ['label' => 'Referrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referrals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
