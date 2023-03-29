<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Standard $model */

$this->title = 'Create Standard';
$this->params['breadcrumbs'][] = ['label' => 'Standards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="standard-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
