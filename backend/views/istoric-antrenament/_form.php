<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IstoricAntrenament */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="istoric-antrenament-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'antrenor_id')->textInput() ?>

        <?= $form->field($model, 'sportiv_id')->textInput() ?>

        <?= $form->field($model, 'tipAntrenament_id')->textInput() ?>

        <?= $form->field($model, 'grad_dificultate')->textInput() ?>

        <?= $form->field($model, 'rating')->textInput() ?>

        <?= $form->field($model, 'data_antrenament')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
