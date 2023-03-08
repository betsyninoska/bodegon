<?php

use app\models\Tipoentrada;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\tipoentradaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Tipos de entradas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoentrada-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tipoentrada',
            'Nombre',
            //'Status',
            //'Fecha_Registro',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tipoentrada $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_tipoentrada' => $model->id_tipoentrada]);
                 }
            ],
        ],
    ]); ?>


</div>
