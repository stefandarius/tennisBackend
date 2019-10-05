<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sportivi */

$this->title = 'Actualizare sportivi: ' . $model->numeComplet;
$this->params['breadcrumbs'][] = ['label' => 'Sportivis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->numeComplet, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizare';
?>
<div class="sportivi-update">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
