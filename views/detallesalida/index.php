<?php

use app\models\Detallesalida;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\detallesalidaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Detallesalidas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallesalida-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Detallesalida'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id_detallesalida',
            'Id_Entrada',
            'Id_Salida',
            'Cantidad',
            'Status',
            //'Fecha_Registro',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Detallesalida $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Id_detallesalida' => $model->Id_detallesalida]);
                 }
            ],
        ],
    ]); ?>


</div>
