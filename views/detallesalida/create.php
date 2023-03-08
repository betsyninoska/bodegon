<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detallesalida $model */

$this->title = Yii::t('app', 'Create Detallesalida');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detallesalidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallesalida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
