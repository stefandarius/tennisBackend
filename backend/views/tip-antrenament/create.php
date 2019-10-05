<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TipAntrenament */

$this->title = 'Create Tip Antrenament';
$this->params['breadcrumbs'][] = ['label' => 'Tip Antrenaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tip-antrenament-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
