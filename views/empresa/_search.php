<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EmpresaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="empresa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id_Empresa') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Direccion') ?>

    <?= $form->field($model, 'Rif') ?>

    <?= $form->field($model, 'Telefono') ?>

    <?php // echo $form->field($model, 'Logo') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Fecha_Registro') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
