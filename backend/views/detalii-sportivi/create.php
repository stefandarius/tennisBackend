<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DetaliiSportivi */

$this->title = 'Create Detalii Sportivi';
$this->params['breadcrumbs'][] = ['label' => 'Detalii Sportivis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalii-sportivi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
