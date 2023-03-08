<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\detallesalidaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detallesalida-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id_detallesalida') ?>

    <?= $form->field($model, 'Id_Entrada') ?>

    <?= $form->field($model, 'Id_Salida') ?>

    <?= $form->field($model, 'Cantidad') ?>

    <?= $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Fecha_Registro') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
