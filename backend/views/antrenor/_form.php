<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Antrenori */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="antrenori-form box box-info">

    <div class="box-header with-border">
        <h3 class="box-title"><?= yii\bootstrap\Html::encode($this->title) ?></h3>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="box-body">
        <fieldset>
            <legend>Detalii personale</legend>
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'nume')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'prenume')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-6">
                    <?php
                    $data = [1 => 'Barbat', 0 => 'Femeie'];
                    echo $form->field($model, 'gen')->radioButtonGroup($data)->label('Gen', ['style' => 'display:block;']);
                    ?>
                </div>
            </div>
        </fieldset>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
