<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TipAntrenament */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tip-antrenament-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'denumirea')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activ')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
