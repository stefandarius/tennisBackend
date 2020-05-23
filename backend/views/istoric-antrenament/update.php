<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\IstoricAntrenament */

$this->title = 'Update Istoric Antrenament: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Istoric Antrenaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="istoric-antrenament-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
