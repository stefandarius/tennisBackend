<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DetaliiSportivi */

$this->title = 'Update Detalii Sportivi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Detalii Sportivis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalii-sportivi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
