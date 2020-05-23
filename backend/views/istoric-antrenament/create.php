<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IstoricAntrenament */

$this->title = 'Create Istoric Antrenament';
$this->params['breadcrumbs'][] = ['label' => 'Istoric Antrenaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="istoric-antrenament-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
