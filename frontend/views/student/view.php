<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Students;
use yii\helpers\Url;


/** @var yii\web\View $this */
/** @var common\models\Students $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="students-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'email:email',
            'phone',
            'address:ntext',
            [
                'label'=>'Standard',
                'value' => $model->standard->name
            ],
            [
                'label'=>'Country',
                'value' => $model->country->name
            ],
            [
                'label'=>'State',
                'value' => $model->state->name
            ],
            [
                'label'=>'District',
                'value' => $model->district->name
            ],
            [
                'label'=>'Taluk',
                'value' => $model->taluk->name
            ],
            [
                'label' => 'Student Image',
                'attribute' => 'student_image',
                'format' => 'html',
                'value' => function($model){
                    return yii\bootstrap5\Html::img(Url::base().'/'.$model->student_image,['width'=>'150']);
                }
            ],
        ],
    ]) ?>

</div>
