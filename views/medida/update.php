<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Medida $model */

$this->title = Yii::t('app', 'Update Medida: {name}', [
    'name' => $model->Id_UMedida,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Medidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_UMedida, 'url' => ['view', 'Id_UMedida' => $model->Id_UMedida]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="medida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
