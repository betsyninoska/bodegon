<?php

use app\models\Medida;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MedidaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Medidas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medida-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Medida'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id_UMedida',
            'Nombre',
            'Abreviaturas',
            'Simbolo_Medida',
            'Catidad_Medida',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Medida $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Id_UMedida' => $model->Id_UMedida]);
                 }
            ],
        ],
    ]); ?>


</div>
