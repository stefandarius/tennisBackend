<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\IstoricAntrenamentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Istoric Antrenaments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="istoric-antrenament-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-header with-border">
        <?= Html::a('Create Istoric Antrenament', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'antrenor_id',
                'sportiv_id',
                'tipAntrenament_id',
                'grad_dificultate',
                // 'rating',
                // 'data_antrenament',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
