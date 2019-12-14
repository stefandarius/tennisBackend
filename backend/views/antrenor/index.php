<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista antrenori';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profil-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Create Profil', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    ['attribute' => 'nume',
                        'value' => function($model) {
                            return $model->nume;
                        }],
                    ['attribute' => 'prenume',
                        'value' => function($model) {
                            return $model->prenume;
                        }],
                    ['attribute' => 'gen',
                        'format' => 'raw',
                        'filter' => Html::activeDropDownList($searchModel, 'gen', [1 => 'Baiat', 0 => 'Fata'], ['prompt' => "--Toti--",
                            'class' => 'selectpicker form-control',
                            'data-style' => "btn-primary"]),
                        'value' => function($model) {
                            return Html::tag('span', $model->gen ? 'Baiat' : 'Fata', ['style' => sprintf('color:%s', $model->gen ? 'red' : 'green')]);
                        },],
                    ['attribute' => 'data_nastere',
                        'value' => function($model) {
                            return Yii::$app->formatter->asDate($model->data_nastere);
                        }],
                    ['attribute' => 'telefon',
                        'value' => function($model) {
                            return $model->telefon;
                        }],
                    ['attribute' => 'judet',
                        'filter' => Html::activeDropDownList($searchModel, 'judet', \yii\helpers\ArrayHelper::map(backend\models\Judete::find()->all(), 'id', 'nume'), ['prompt' => '--Toate judetele--', 'class' => 'selectpicker form-control',
                            'data-style' => "btn-primary"]),
                        'value' => function($model) {
                            return $model->localitate0->judet0->nume;
                        }
                    ],
                    ['attribute' => 'nume_localitate',
                        'label' => 'Localitate',
                        'value' => function($model) {
                            return $model->localitate0->nume;
                        }],
                    //'stare_sanatate',
                    ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
