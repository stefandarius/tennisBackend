<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sportivi */

$this->title = 'Adaugare date sportiv';
$this->params['breadcrumbs'][] = ['label' => 'Administrare sportivi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sportivi-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
