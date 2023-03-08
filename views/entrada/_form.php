<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Proveedor;
use app\models\Producto;
use app\models\Tipoentrada;
/** @var yii\web\View $this */
/** @var app\models\Entrada $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="entrada-form">

    <?php $form = ActiveForm::begin(); ?>


    <?=  $form->field($model, 'id_Proveedor')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Proveedor::find()->all(), 'Id_Proveedor', 'Nombre'),
        'theme' => Select2::THEME_KRAJEE_BS5,
        'options' => ['placeholder' => Yii::t('app', 'Seleccione el proveedor ')],
        'pluginOptions' => [
            'allowClear' => true
    ],
    ]);
    ?>

    <?=  $form->field($model, 'Id_Producto')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Producto::find()->all(), 'Id_Producto', 'Nombre'),
        'theme' => Select2::THEME_KRAJEE_BS5,
        'options' => ['placeholder' => Yii::t('app', 'Seleccione el producto ')],
        'pluginOptions' => [
            'allowClear' => true
    ],
    ]);
    ?>

    <?=  $form->field($model, 'id_tipoentrada')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Tipoentrada::find()->all(), 'id_tipoentrada', 'Nombre'),
        'theme' => Select2::THEME_KRAJEE_BS5,
        'options' => ['placeholder' => Yii::t('app', 'Seleccione el tipo de ingreso ')],
        'pluginOptions' => [
            'allowClear' => true
    ],
    ]);
    ?>






    <?= $form->field($model, 'Codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fecha_Entrada')->textInput() ?>

    <?= $form->field($model, 'Cantidad_entrada')->textInput() ?>

    <?= $form->field($model, 'Precio_compra')->textInput() ?>

<!--<?= $form->field($model, 'id_tipoentrada')->textInput() ?>
    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Fecha_Registro')->textInput() ?>-->

    <br>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
