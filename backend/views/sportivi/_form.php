<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;

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
                    <?= $form->field($model, 'data_nastere')->textInput() ?>
                </div>
                <div class="col-sm-6">
                    <?php
                    $data = [1 => 'Barbat', 0 => 'Femeie'];
                    echo $form->field($model, 'sex')->radioButtonGroup($data)->label('Gen', ['style' => 'display:block;']);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'numar_telefon')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <?=
                    $form->field($model, 'judet')->dropDownList(yii\helpers\ArrayHelper::map(backend\models\Judete::find()->all(), 'id', 'nume'), ['prompt' => '--Selectati judetul--',
                        'onchange' => '$.get("index.php?r=site/localitati-by-judet&id=' . '"+$(this).val(),function(data){'
                        . '$("#sportivi-localitate").html(data);});'
                    ])
                    ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'localitate')->dropDownList(yii\helpers\ArrayHelper::map(backend\models\Localitati::findAll(['judet' => $model->judet]), 'id', 'nume'), ['prompt' => '--Selectati localitatea--']) ?>
                </div>
            </div>




        </fieldset>
        <fieldset>
            <legend style="color:red">Detalii fizice</legend>  
            <div class="row">
                <div class="col-sm-6"> <?= $form->field($model, 'stare_sanatate')->textInput() ?></div>
                <div class="col-sm-6">
                    <?php
                    $data = [1 => 'Incepator', 2 => 'Intermediar', 3 => 'Avansat', 4 => 'Profesionist'];
                    //$data = [\yii\helpers\ArrayHelper::map(app\models\Niveluri::find()->all(), 'id', 'nume')];
                    echo $form->field($model, 'nivel')->radioButtonGroup($data)->label('Nivel', ['style' => 'display:block;']);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6"> <?= $form->field($model, 'greutate')->textInput() ?></div>
                <div class="col-sm-6"><?= $form->field($model, 'inaltime')->textInput() ?></div>  
            </div>      
        </fieldset>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
