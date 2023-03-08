<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Detallesalida $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detallesalida-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id_Entrada')->textInput() ?>

    <?= $form->field($model, 'Id_Salida')->textInput() ?>

    <?= $form->field($model, 'Cantidad')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Fecha_Registro')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
