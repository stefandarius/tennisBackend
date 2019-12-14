<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DetaliiSportiviSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalii-sportivi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'profil') ?>

    <?= $form->field($model, 'nivel') ?>

    <?= $form->field($model, 'greutate') ?>

    <?= $form->field($model, 'inaltime') ?>

    <?php // echo $form->field($model, 'stare_sanatate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
