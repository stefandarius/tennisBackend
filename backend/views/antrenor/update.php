<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Antrenori */

$this->title = 'Actualizare antrenori: ' . $model->numeComplet;
$this->params['breadcrumbs'][] = ['label' => 'Antrenori', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->numeComplet, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizare';
?>
<div class="antrenori-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
