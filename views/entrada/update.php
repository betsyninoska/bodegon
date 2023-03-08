<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Entrada $model */

$this->title = Yii::t('app', 'Update Entrada: {name}', [
    'name' => $model->Id_Entrada,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entradas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Entrada, 'url' => ['view', 'Id_Entrada' => $model->Id_Entrada]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="entrada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
