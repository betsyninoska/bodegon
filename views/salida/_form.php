<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Salida $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="salida-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id_Producto')->textInput() ?>

    <?= $form->field($model, 'Id_UMedida')->textInput() ?>

    <?= $form->field($model, 'Id_DMedida')->textInput() ?>

    <?= $form->field($model, 'Fecha_Salida')->textInput() ?>

    <?= $form->field($model, 'Cantidad_Salida')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
