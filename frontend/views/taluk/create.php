<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Taluk $model */

$this->title = 'Create Taluk';
$this->params['breadcrumbs'][] = ['label' => 'Taluks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taluk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
