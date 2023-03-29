<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Country;
use common\models\State;
use common\models\District;
use yii\helpers\ArrayHelper;


/** @var yii\web\View $this */
/** @var common\models\Taluk $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="taluk-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'country_id')->label('Country')->textInput()->dropDownList(ArrayHelper::map(Country::find()->all(), 'id','name'),['prompt'=>'Select Your Country','id'=>'countryid'])  ?>
    
    <?= $form->field($model, 'state_id')->label('State')->textInput()->dropDownList(ArrayHelper::map(State::find()->all(), 'id','name'),['prompt'=>'Select Your State','id'=>'stateid'])  ?>
    
    <?= $form->field($model, 'district_id')->label('District')->textInput()->dropDownList(ArrayHelper::map(District::find()->all(), 'id','name'),['prompt'=>'Select Your District','id'=>'districtid'])  ?>    
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
