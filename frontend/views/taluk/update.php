<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Taluk $model */

$this->title = 'Update Taluk: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Taluks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="taluk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
