<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Antrenori */

$this->title = 'Adauga date antrenor';
$this->params['breadcrumbs'][] = ['label' => 'Administrare antrenori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antrenori-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
