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
        <div class="row">
            <div class="col-sm-12">

                <?= $form->field($model, 'nume')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'prenume')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
