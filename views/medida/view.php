<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Medida $model */

$this->title = $model->Id_UMedida;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Medidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="medida-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'Id_UMedida' => $model->Id_UMedida], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'Id_UMedida' => $model->Id_UMedida], [
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
            'Id_UMedida',
            'Nombre',
            'Abreviaturas',
            'Simbolo_Medida',
            'Catidad_Medida',
        ],
    ]) ?>

</div>
