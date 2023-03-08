<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Detallem $model */

$this->title = $model->Id_DMedida;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detallems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detallem-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'Id_DMedida' => $model->Id_DMedida, 'Id_UMedida' => $model->Id_UMedida], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'Id_DMedida' => $model->Id_DMedida, 'Id_UMedida' => $model->Id_UMedida], [
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
            'Id_DMedida',
            'Id_UMedida',
            'Nombre',
            'Cantidad_Detalle',
            'Descripcion',
        ],
    ]) ?>

</div>
