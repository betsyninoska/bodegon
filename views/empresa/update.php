<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Empresa $model */

$this->title = Yii::t('app', 'Update Empresa: {name}', [
    'name' => $model->Id_Empresa,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empresas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Empresa, 'url' => ['view', 'Id_Empresa' => $model->Id_Empresa]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="empresa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
