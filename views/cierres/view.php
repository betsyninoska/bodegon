<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Cierres $model */

$this->title = $model->Id_Cierre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cierres'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cierres-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modificar'), ['update', 'Id_Cierre' => $model->Id_Cierre], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'Id_Cierre' => $model->Id_Cierre], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Estas seguro que desea eliminar el registro?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id_Cierre',
            'Inicio',
            'fin',
            'Status',
            'Fecha_Registro',
        ],
    ]) ?>

</div>
