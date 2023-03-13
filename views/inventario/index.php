<?php

use app\models\Inventario;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\inventarioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Inventarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
        <?= Html::a(Yii::t('app', 'Create Inventario'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id_Inventario',
            'Id_Cierre',
            //'Id_Producto',
            [
              'attribute' => 'Producto',//<---Variable para filtro
              'value' => 'producto.Nombre'//<----Relación y columna que se va a mostrar
            ],
            'Cantidad_Inicial',
            'Existencia',
            //'Status',
            //'Fecha_Registro',
            /*[
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Inventario $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Id_Inventario' => $model->Id_Inventario]);
                 }
            ],*/
        ],
    ]); ?>


</div>
