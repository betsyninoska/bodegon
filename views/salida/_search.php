<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SalidaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="salida-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id_Salida') ?>

    <?= $form->field($model, 'Id_Producto') ?>

    <?= $form->field($model, 'Id_UMedida') ?>

    <?= $form->field($model, 'Id_DMedida') ?>

    <?= $form->field($model, 'Fecha_Salida') ?>

    <?php // echo $form->field($model, 'Cantidad_Salida') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
