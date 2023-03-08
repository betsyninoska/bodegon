<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Salida $model */

$this->title = $model->Id_Salida;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="salida-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'Id_Salida' => $model->Id_Salida], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'Id_Salida' => $model->Id_Salida], [
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
            'Id_Salida',
            'Id_Producto',
            'Id_UMedida',
            'Id_DMedida',
            'Fecha_Salida',
            'Cantidad_Salida',
        ],
    ]) ?>

</div>
