<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista sportivi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sportivi-index">
    <div class="box">
        <div class="box-header">
            <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="box-body">
            <p>
                <?= Html::a('Adaugare sportivi', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php Pjax::begin(); ?>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'layout' => "{items}\n{pager}\n{summary}",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    'nume',
                    'prenume',
                    'data_nastere:date',
                    ['attribute' => 'sex',
                        'format' => 'raw',
                        'filter' => Html::activeDropDownList($searchModel, 'sex', [1 => 'Baiat', 0 => 'Fata'], ['prompt' => "--Toate--",
                            'class' => 'selectpicler form-control',
                            'data-style' => "btn-primary"]),
                        'value' => function($model) {
                            return Html::tag('span', $model->sex ? 'Baiat' : 'Fata', ['style' => sprintf('color:%s', $model->sex ? 'red' : 'green')]);
                        },],
                    //'nivel',
                    //'email:email',
                    //'greutate',
                    //'inaltime:datetime',
                    //'stare_sanatate',
                    //'numar_telefon',
                    ['attribute' => 'judet',
                        'filter' => Html::activeDropDownList($searchModel, 'judet', \yii\helpers\ArrayHelper::map(backend\models\Judete::find()->all(), 'id', 'nume'), 
                            ['prompt' => '--Toate--', 'class' => 'selectpicler form-control',
                            'data-style' => "btn-primary"]),
                        'value'=>function($model) {
                            return $model->localitate0->judet0->nume;
                        }
                    ],
                    'localitate0.nume:text:Localitate',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>

            <?php Pjax::end(); ?>

        </div>
    </div>

</div>
