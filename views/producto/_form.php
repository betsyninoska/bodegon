<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Medida;
use app\models\Categoria;

/** @var yii\web\View $this */
/** @var app\models\Producto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'Id_UMedida')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Medida::find()->all(), 'Id_UMedida', 'Nombre'),
        'theme' => Select2::THEME_KRAJEE_BS5,
        'options' => ['placeholder' => Yii::t('app', 'Selecciona unidad de medida ')],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ]);
    ?>

    <?=  $form->field($model, 'Id_Categoria')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Categoria::find()->all(), 'Id_Categoria', 'Nombre'),
        'theme' => Select2::THEME_KRAJEE_BS5,
        'options' => ['placeholder' => Yii::t('app', 'Selecciona categoria ')],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ]);
    ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Fecha_registro')->widget(
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
