<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\REFERRALRECEIVED */

$this->title = 'Create Referralreceived';
$this->params['breadcrumbs'][] = ['label' => 'Referralreceiveds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referralreceived-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
