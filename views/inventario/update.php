<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Inventario $model */

$this->title = Yii::t('app', 'Update Inventario: {name}', [
    'name' => $model->Id_Inventario,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Inventario, 'url' => ['view', 'Id_Inventario' => $model->Id_Inventario]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="inventario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
