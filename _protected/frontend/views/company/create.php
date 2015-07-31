<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\COMPANIES */

$this->title = 'Create Companies';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="companies-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= 
        // Make sure to set second model name (officeLocation) for multi-model form
        $this->render('_form', [
        'model' => $model,
        'officeLocation' => $officeLocation,
    ]) ?>

</div>
