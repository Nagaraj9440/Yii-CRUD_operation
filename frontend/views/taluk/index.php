<?php

use common\models\Taluk;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\TalukSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Taluks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taluk-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Taluk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute'=>'country_id',
               'label'=>'Country',
                'value'=>'country.name',
            ],
            [
                'attribute'=>'state_id',
               'label'=>'State',
                'value'=>'state.name',
           ],
           [
                   'attribute'=>'district_id',
                  'label'=>'District',
                  'value'=>'district.name',
           ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Taluk $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
