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
                        'filter' => Html::activeDropDownList($searchModel, 'sex', [1 => 'Baiat', 0 => 'Fata'], ['class' => 'selectpicker form-control', 'data-style' => "btn-primary", 'prompt' => '--Toti--']),
                        'format' => 'raw', 'value' => function($model) {
                            return Html::tag('span', $model->sex ? 'Baiat' : 'Fata', ['style' => sprintf('color:%s', $model->sex ? 'red' : 'green')]);
                        },],

                    ['attribute' => 'judet',
                        'filter' => Html::activeDropDownList($searchModel, 'judet', yii\helpers\ArrayHelper::map(\backend\models\Judete::find()->all(), 'id', 'nume'), ['class' => 'selectpicker form-control', 'data-style' => "btn-primary", 'prompt' => '--Toate judetele--']),
                        'value' => function($model) {

                            return $model->localitate0->judet0->nume;
                        }
                    ],
                    ['attribute' => 'nume_localitate',
                        'value' => function($model) {
                            return $model->localitate0->nume;
                        }],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>

            <?php Pjax::end(); ?>

        </div>
    </div>

</div>
