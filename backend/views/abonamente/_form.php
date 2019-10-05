<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Abonamente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="abonamente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'denumire')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numar_sedinte')->textInput() ?>

    <?= $form->field($model, 'pret')->textInput() ?>

    <?= $form->field($model, 'durata')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
