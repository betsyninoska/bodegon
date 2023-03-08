<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Proveedor $model */

//$this->title = Yii::t('app', 'Create Proveedor');
$this->title = 'Crear Proveedor';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proveedors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proveedor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
