<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Abonamente */

$this->title = 'Create Abonamente';
$this->params['breadcrumbs'][] = ['label' => 'Abonamentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abonamente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
