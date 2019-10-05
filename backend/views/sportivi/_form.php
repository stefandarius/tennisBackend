<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Sportivi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sportivi-form box box-info">

    <div class="box-header with-border">
        <h3 class="box-title"><?= yii\bootstrap\Html::encode($this->title) ?></h3>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <?= $form->field($model, 'nume')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'prenume')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'data_nastere')->textInput() ?>

                <?= $form->field($model, 'sex')->checkbox() ?>

                <?= $form->field($model, 'nivel')->textInput() ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'greutate')->textInput() ?>

                <?= $form->field($model, 'inaltime')->textInput() ?>

                <?= $form->field($model, 'stare_sanatate')->textInput() ?>

                <?= $form->field($model, 'numar_telefon')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
