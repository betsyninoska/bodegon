<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Cierres $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cierres-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Inicio')->textInput() ?>

    <?= $form->field($model, 'fin')->textInput() ?>

    <!--<?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Fecha_Registro')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
