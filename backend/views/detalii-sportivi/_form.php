<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DetaliiSportivi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalii-sportivi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'profil')->textInput() ?>

    <?= $form->field($model, 'nivel')->textInput() ?>

    <?= $form->field($model, 'greutate')->textInput() ?>

    <?= $form->field($model, 'inaltime')->textInput() ?>

    <?= $form->field($model, 'stare_sanatate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
