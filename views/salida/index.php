<?php

use app\models\Salida;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SalidaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Salidas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salida-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Salida'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id_Salida',
            'Id_Producto',
            'Id_UMedida',
            'Id_DMedida',
            'Fecha_Salida',
            //'Cantidad_Salida',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Salida $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Id_Salida' => $model->Id_Salida]);
                 }
            ],
        ],
    ]); ?>


</div>
