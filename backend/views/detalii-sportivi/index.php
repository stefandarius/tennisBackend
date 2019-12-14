<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DetaliiSportiviSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista sportivi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalii-sportivi-index">
    <div class="box">
        <div class="box-header">
            <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="box-body">
<!--            <p>
                <?= Html::a('Adaugare sportivi', ['create'], ['class' => 'btn btn-success']) ?>
            </p>-->


            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'layout' => "{items}\n{pager}\n{summary}",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    ['attribute' => 'nume',
                        'value' => function($model) {
                            return $model->profil0->nume;
                        }],
                    ['attribute' => 'prenume',
                        'value' => function($model) {
                            return $model->profil0->prenume;
                        }],
                    ['attribute' => 'gen',
                        'format' => 'raw',
                        'filter' => Html::activeDropDownList($searchModel, 'gen', [1 => 'Baiat', 0 => 'Fata'], ['prompt' => "--Toti--",
                            'class' => 'selectpicker form-control',
                            'data-style' => "btn-primary"]),
                        'value' => function($model) {
                            return Html::tag('span', $model->profil0->gen ? 'Baiat' : 'Fata', ['style' => sprintf('color:%s', $model->profil0->gen ? 'red' : 'green')]);
                        },],
                    ['attribute' => 'data_nastere',
                        'value' => function($model) {
                            return Yii::$app->formatter->asDate($model->profil0->data_nastere);
                        }],
                    ['attribute' => 'telefon',
                        'value' => function($model) {
                            return $model->profil0->telefon;
                        }],
                    ['attribute' => 'judet',
                        'filter' => Html::activeDropDownList($searchModel, 'judet', \yii\helpers\ArrayHelper::map(backend\models\Judete::find()->all(), 'id', 'nume'), ['prompt' => '--Toate judetele--', 'class' => 'selectpicker form-control',
                            'data-style' => "btn-primary"]),
                        'value' => function($model) {
                            return $model->profil0->localitate0->judet0->nume;
                        }
                    ],
                    ['attribute' => 'localitate_nume',
                        'label' => 'Localitate',
                        'value' => function($model) {
                            return $model->profil0->localitate0->nume;
                        }],
                    //'stare_sanatate',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>

            <?php Pjax::end(); ?>

        </div>
    </div>

</div>
