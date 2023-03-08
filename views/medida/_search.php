<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MedidaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="medida-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id_UMedida') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Abreviaturas') ?>

    <?= $form->field($model, 'Simbolo_Medida') ?>

    <?= $form->field($model, 'Catidad_Medida') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
