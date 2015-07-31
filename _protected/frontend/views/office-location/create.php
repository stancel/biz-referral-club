<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OFFICELOCATIONS */

$this->title = 'Create Office Location';
$this->params['breadcrumbs'][] = ['label' => 'Office Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="officelocations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
