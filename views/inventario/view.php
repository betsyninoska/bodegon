<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Inventario $model */

$this->title = $model->Id_Inventario;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="inventario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'Id_Inventario' => $model->Id_Inventario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'Id_Inventario' => $model->Id_Inventario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id_Inventario',
            'Id_Cierre',
            'Id_Producto',
            'Cantidad_Inicial',
            'Existencia',
            'Status',
            'Fecha_Registro',
        ],
    ]) ?>

</div>
