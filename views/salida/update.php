<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Salida $model */

$this->title = Yii::t('app', 'Update Salida: {name}', [
    'name' => $model->Id_Salida,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Salida, 'url' => ['view', 'Id_Salida' => $model->Id_Salida]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="salida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
