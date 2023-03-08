<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detallem $model */

$this->title = Yii::t('app', 'Create Detallem');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detallems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
