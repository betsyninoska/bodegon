<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tipoentrada $model */

$this->title = Yii::t('app', 'Crear el tipo de entrada');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipoentradas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoentrada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
