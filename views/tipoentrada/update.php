<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tipoentrada $model */

$this->title = Yii::t('app', 'Update Tipoentrada: {name}', [
    'name' => $model->id_tipoentrada,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipoentradas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipoentrada, 'url' => ['view', 'id_tipoentrada' => $model->id_tipoentrada]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipoentrada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
