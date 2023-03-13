<?php

use app\models\Detallesalida;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\detallesalidaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Detalle de las salida');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallesalida-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
        <?= Html::a(Yii::t('app', 'Create Detallesalida'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?= Html::a('Salidas', ['/salida/index'], ['class'=>'btn btn-success']) ?>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Id_detallesalida',

            //'Id_Entrada',
            [
              'attribute' => 'Fecha Entrada',//<---Variable para filtro
              'value' => 'entrada.Fecha_Entrada'//<----Relación y columna que se va a mostrar
            ],

            [
              'attribute' => 'Cantidad Entrada',//<---Variable para filtro
              'value' => 'entrada.Cantidad_entrada'//<----Relación y columna que se va a mostrar
            ],

            'Cantidad',
            [
              'attribute' => 'Existencia',//<---Variable para filtro
              'value' => 'entrada.Cantidad_existe'//<----Relación y columna que se va a mostrar
            ],
            //'Id_Entrada',

            //'Id_Salida',

            //'Status',
            //'Fecha_Registro',
            /*[
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Detallesalida $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Id_detallesalida' => $model->Id_detallesalida]);
                 }
            ],*/


            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function($action, $model, $key, $index) {
                        return Url::toRoute(['detallesalida/view','Id_detallesalida' => $model->Id_detallesalida]); },
                'template' => '{view}',

            ],

        ],
    ]); ?>


</div>
