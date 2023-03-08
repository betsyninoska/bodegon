<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Categoria $model */

$this->title = Yii::t('app', 'Update Categoria: {name}', [
    'name' => $model->Id_Categoria,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Categoria, 'url' => ['view', 'Id_Categoria' => $model->Id_Categoria]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="categoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
