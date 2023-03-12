<?php

use app\models\Entrada;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\entradaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Entradas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entrada-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Entrada'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'Id_Producto',
            [
              'attribute' => 'Producto',//<---Variable para filtro
              'value' => 'producto.Nombre'//<----Relación y columna que se va a mostrar
            ],
            //'id_Proveedor',
            [
              'attribute' => 'Proveedor',//<---Variable para filtro
              'value' => 'proveedor.Nombre'//<----Relación y columna que se va a mostrar
            ],
            //'id_Proveedor',
            [
              'attribute' => 'Tipoentrada',//<---Variable para filtro
              'value' => 'tipoentrada.Nombre'//<----Relación y columna que se va a mostrar
            ],
            'Codigo',
            'Fecha_Entrada',
            'Cantidad_entrada',
            'Cantidad_existe',
            'Precio_compra',
            //'Status',
            //'Fecha_Registro',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Entrada $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Id_Entrada' => $model->Id_Entrada]);
                 }
            ],
        ],
    ]); ?>


</div>
