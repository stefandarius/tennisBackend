<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Antrenori */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="antrenori-form box box-info">

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
            <div class="row">
                <div class="col-sm-6">
                    <?=
                    $form->field($model, 'judet')->dropDownList(yii\helpers\ArrayHelper::map(backend\models\Judete::find()->all(), 'id', 'nume'), ['prompt' => '--Selectati judetul--',
                        'onchange' => '$.get("index.php?r=site/localitati-by-judet&id=' . '"+$(this).val(),function(data){'
                        . '$("#antrenori-localitate").html(data);});'
                    ])
                    ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'localitate')->dropDownList(yii\helpers\ArrayHelper::map(backend\models\Localitati::findAll(['judet' => $model->judet]), 'id', 'nume'), ['prompt' => '--Selectati localitatea--']) ?>
                </div>
            </div>
        </fieldset>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
