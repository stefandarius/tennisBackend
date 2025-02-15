<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TipAntrenament */

$this->title = 'Update Tip Antrenament: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tip Antrenaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tip-antrenament-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
