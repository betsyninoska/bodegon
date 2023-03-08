<?php

use app\models\Cierres;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\cierresSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Cierres');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cierres-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Cierres'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id_Cierre',
            'Inicio',
            'fin',
            'Status',
            'Fecha_Registro',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cierres $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Id_Cierre' => $model->Id_Cierre]);
                 }
            ],
        ],
    ]); ?>


</div>
