<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DetaliiSportivi */

$this->title = $model->profil0->numeComplet;
$this->params['breadcrumbs'][] = ['label' => 'Detalii Sportivis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detalii-sportivi-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'profil0.numeComplet:text:Nume complet',
            'profil0.data_nastere:date:Data nasterii',
            ['attribute' => 'gen', 'value' => $model->profil0->gen == 1 ? 'Barbat' : 'Femeie'],
            'profil0.localitate0.judet0.nume:text:Judet',
            'profil0.localitate0.nume:text:Localitate',
            'profil0.telefon:text:Telefon',
            'nivel0.nume:text:Nivel',
            'greutate',
            'inaltime',
            'stareSanatate.nume:text:Stare sanatate',
        ],
    ])
    ?>

</div>
