<?php

use app\models\Salida;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\salidaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Salidas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salida-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Salidas'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id_Salida',
            //'Id_Producto',
            [
              'attribute' => 'Producto',//<---Variable para filtro
              'value' => 'producto.Nombre'//<----Relación y columna que se va a mostrar
            ],
            'Codigo',
            'Descripcion',
            'Fecha_Salida',
            'Cantidad_Salida',
            //'Status',
            //'Fecha_Registro',

            /*[
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Salida $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Id_Salida' => $model->Id_Salida]);
                 }
            ],*/


            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function($action, $model, $key, $index) {
                        return Url::toRoute(['detallesalida/index','Id_Salida' => $model->Id_Salida]); },
                'template' => '{view}',

            ],
        ],
    ]); ?>


</div>
