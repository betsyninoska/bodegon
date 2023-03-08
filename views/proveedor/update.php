<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Proveedor $model */

$this->title = Yii::t('app', 'Actualizar proveedor: {name}', [
    'name' => $model->Nombre,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proveedors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Proveedor, 'url' => ['view', 'Id_Proveedor' => $model->Id_Proveedor]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="proveedor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
