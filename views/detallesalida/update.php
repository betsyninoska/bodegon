<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detallesalida $model */

$this->title = Yii::t('app', 'Update Detallesalida: {name}', [
    'name' => $model->Id_detallesalida,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detallesalidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_detallesalida, 'url' => ['view', 'Id_detallesalida' => $model->Id_detallesalida]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="detallesalida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
