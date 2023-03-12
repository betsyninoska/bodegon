<?php

use app\models\Producto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\productoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Productos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Producto'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Id_Categoria',
            [
              'attribute' => 'Producto',//<---Variable para filtro
              'value' => 'categoria.Nombre'//<----Relación y columna que se va a mostrar
            ],
            //'Id_UMedida',
            [
              'attribute' => 'Medida',//<---Variable para filtro
              'value' => 'uMedida.Nombre'//<----Relación y columna que se va a mostrar
            ],
            'Nombre',
            'Descripcion',
            //'Imagen',
            //'Status',
            //'Fecha_registro',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Producto $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Id_Producto' => $model->Id_Producto]);
                 }
            ],
        ],
    ]); ?>


</div>
