<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Detallesalida $model */

$this->title = $model->Id_detallesalida;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detallesalidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detallesalida-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!--<?= Html::a(Yii::t('app', 'Update'), ['update', 'Id_detallesalida' => $model->Id_detallesalida], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'Id_detallesalida' => $model->Id_detallesalida], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>-->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id_detallesalida',
            'Id_Entrada',
            'Id_Salida',
            'Cantidad',
            'Status',
            'Fecha_Registro',
        ],
    ]) ?>

</div>
