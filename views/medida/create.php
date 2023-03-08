<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Medida $model */

$this->title = Yii::t('app', 'Create Medida');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Medidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
