<?php

use app\models\Detallem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DetallemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Detallems');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallem-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Detallem'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id_DMedida',
            'Id_UMedida',
            'Nombre',
            'Cantidad_Detalle',
            'Descripcion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Detallem $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Id_DMedida' => $model->Id_DMedida, 'Id_UMedida' => $model->Id_UMedida]);
                 }
            ],
        ],
    ]); ?>


</div>
