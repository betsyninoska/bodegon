<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Empresa $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="empresa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Rif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>

     

    <?= $form->field($model, 'Logo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Fecha_Registro')->widget(
        \yii\widgets\MaskedInput::class, [
            'mask' => "y-2-1",
            'clientOptions' => [
                'alias' => 'datetime',
                "placeholder" => "yyyy-mm-dd",
                "separator" => "-"
            ]
        ]
    ); ?>

    <br><div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
