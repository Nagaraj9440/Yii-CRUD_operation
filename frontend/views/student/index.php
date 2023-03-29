<?php

use common\models\Students;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
//use yii\grid\GridView;
use yii\widgets\Pjx;
use kartik\export\ExportMenu;
use kartik\grid\GridView;


/** @var yii\web\View $this */
/** @var common\models\StudentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Students', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    $gridColumns=[
        'id',
        [
            'attribute'=>'name',
            'label'=>'Name'
        ],
        [
            'attribute'=>'phone',
            'label'=>'Phone'
        ],
        [
            'attribute'=>'address',
            'label'=>'Address'
        ],
        [
            'attribute'=>'standard_id',
            'label'=>'Standard',
            'value'=>'standard.name'
        ],
        [
            'attribute'=>'country_id',
            'label'=>'Country',
            'value'=>'country.name'
        ],
        [
            'attribute'=>'state_id',
            'label'=>'State',
            'value'=>'state.name'
        ],
         [
            'attribute'=>'district_id',
            'label'=>'District',
            'value'=>'district.name'
        ],
        [
            'attribute'=>'taluk_id',
            'label'=>'Taluk',
            'value'=>'taluk.name'
        ],
        
        
    ];

    echo Exportmenu::widget([

        'dataProvider'=>$dataProvider,
        'columns'=>$gridColumns
    ]);
    ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'pjax'=>true,
'rowOptions'=>function($model){

    if($model->name =='inactive')
    {
        return ['class'=>'danger'];
    }
    else{
        return ['class'=>'success'];
    }
},
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'phone',
            'address:ntext',
            [
                'attribute'=>'standard_id',
                'label'=>'Standard',
                'value'=>'standard.name'
            ],
            [
                'attribute'=>'country_id',
                'label'=>'Country',
                'value'=>'country.name'
            ],
            [
                'attribute'=>'state_id',
                'label'=>'State',
                'value'=>'state.name'
            ],
            [
                'attribute'=>'district_id',
                'label'=>'District',
                'value'=>'district.name'
            ],
            [
                'attribute'=>'taluk_id',
                'label'=>'Taluk',
                'value'=>'taluk.name'
            ],
            [
                'label' => 'Student Image',
                'attribute' => 'student_image',
                'format' => 'html',
                'value' => function($model){
                    return yii\bootstrap5\Html::img(Url::base().'/'.$model->student_image,['width'=>'50']);
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Students $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
