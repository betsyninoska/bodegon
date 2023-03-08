<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Inventario $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="inventario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id_Cierre')->textInput() ?>

    <?= $form->field($model, 'Id_Producto')->textInput() ?>

    <?= $form->field($model, 'Cantidad_Inicial')->textInput() ?>

    <?= $form->field($model, 'Existencia')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Fecha_Registro')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
