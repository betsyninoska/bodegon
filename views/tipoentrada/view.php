<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tipoentrada $model */

$this->title = $model->id_tipoentrada;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipoentradas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tipoentrada-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modificar'), ['update', 'id_tipoentrada' => $model->id_tipoentrada], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'eliminar'), ['delete', 'id_tipoentrada' => $model->id_tipoentrada], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Estas seguro que deseas midificar este registro?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tipoentrada',
            'Nombre',
            'Status',
            'Fecha_Registro',
        ],
    ]) ?>

</div>
