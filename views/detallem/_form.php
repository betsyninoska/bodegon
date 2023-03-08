<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Medida;


/** @var yii\web\View $this */
/** @var app\models\Detallem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detallem-form">

    <?php $form = ActiveForm::begin(); ?>
    
    
    <?=  $form->field($model, 'Id_UMedida')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Medida::find()->all(), 'Id_UMedida', 'Nombre'),
        'theme' => Select2::THEME_KRAJEE_BS5,
        'options' => ['placeholder' => Yii::t('app', 'Selecciona unidad de medida ')],
        'pluginOptions' => [
            'allowClear' => true
],
]);
?>
    
    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cantidad_Detalle')->textInput() ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <br><div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
