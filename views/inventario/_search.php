<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\inventarioSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="inventario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id_Inventario') ?>

    <?= $form->field($model, 'Id_Cierre') ?>

    <?= $form->field($model, 'Id_Producto') ?>

    <?= $form->field($model, 'Cantidad_Inicial') ?>

    <?= $form->field($model, 'Existencia') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Fecha_Registro') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
