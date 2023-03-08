<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Medida $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="medida-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Abreviaturas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Simbolo_Medida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Catidad_Medida')->textInput(['maxlength' => true]) ?>

    <br><div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
