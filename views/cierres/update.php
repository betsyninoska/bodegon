<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cierres $model */

$this->title = Yii::t('app', 'Update Cierres: {name}', [
    'name' => $model->Id_Cierre,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cierres'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Cierre, 'url' => ['view', 'Id_Cierre' => $model->Id_Cierre]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cierres-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
