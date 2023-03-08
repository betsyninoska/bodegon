<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Producto $model */

$this->title = Yii::t('app', 'Update Producto: {name}', [
    'name' => $model->Id_Producto,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Producto, 'url' => ['view', 'Id_Producto' => $model->Id_Producto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
