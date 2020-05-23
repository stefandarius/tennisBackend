<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IstoricAntrenamentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="istoric-antrenament-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'antrenor_id') ?>

    <?= $form->field($model, 'sportiv_id') ?>

    <?= $form->field($model, 'tipAntrenament_id') ?>

    <?= $form->field($model, 'grad_dificultate') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'data_antrenament') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
