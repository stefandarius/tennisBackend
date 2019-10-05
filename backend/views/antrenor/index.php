<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista antrenori';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antrenori-index">
    <div class="box">
        <div class="box-header">
            <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="box-body">

            <p>
<?= Html::a('Adauga antrenor', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php Pjax::begin(); ?>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => "{items}\n{pager}\n{summary}",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'nume',
                    'prenume',
                    'email:email',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>

<?php Pjax::end(); ?>

        </div>
    </div>
</div>
