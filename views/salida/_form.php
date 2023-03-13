<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Producto;

/** @var yii\web\View $this */
/** @var app\models\Salida $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="salida-form">

    <?php $form = ActiveForm::begin([]); ?>


   <?=  $form->field($model, 'Id_Producto')->widget(Select2::classname(), [
       'data' => ArrayHelper::map(Producto::find()->all(), 'Id_Producto', 'Nombre'),
       'theme' => Select2::THEME_KRAJEE_BS5,
       'options' => ['placeholder' => Yii::t('app', 'Seleccione el producto ')],
       'pluginOptions' => [
           'allowClear' => true
   ],
   ]);
   ?>

    <?= $form->field($model, 'Codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fecha_Salida')->textInput() ?>

    <?= $form->field($model, 'Cantidad_Salida')->textInput() ?>

    <!--<?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Fecha_Registro')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
