<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detallem $model */

$this->title = Yii::t('app', 'Update Detallem: {name}', [
    'name' => $model->Id_DMedida,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detallems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_DMedida, 'url' => ['view', 'Id_DMedida' => $model->Id_DMedida, 'Id_UMedida' => $model->Id_UMedida]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="detallem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
