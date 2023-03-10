<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Entrada $model */

$this->title = $model->Id_Entrada;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entradas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="entrada-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'Id_Entrada' => $model->Id_Entrada], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'Id_Entrada' => $model->Id_Entrada], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Estas seguro de eliminar este registro?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id_Entrada',
            'id_Proveedor',
            'Id_Producto',
            'id_tipoentrada',
            'Codigo',
            'Fecha_Entrada',
            'Cantidad_entrada',
            'Cantidad_existe',
            'Precio_compra',
            'Status',
            'Fecha_Registro',
        ],
    ]) ?>

</div>
