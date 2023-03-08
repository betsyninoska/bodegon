<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tipoentrada $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tipoentrada-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Fecha_Registro')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
