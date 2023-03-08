<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\entradaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="entrada-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id_Entrada') ?>

    <?= $form->field($model, 'id_Proveedor') ?>

    <?= $form->field($model, 'Id_Producto') ?>

    <?= $form->field($model, 'id_tipoentrada') ?>

    <?= $form->field($model, 'Codigo') ?>

    <?php // echo $form->field($model, 'Fecha_Entrada') ?>

    <?php // echo $form->field($model, 'Cantidad_entrada') ?>

    <?php // echo $form->field($model, 'Precio_compra') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Fecha_Registro') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
