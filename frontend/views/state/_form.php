<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Country;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\State $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="state-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country_id')->label('Country')->textInput()->dropDownList(ArrayHelper::map(Country::find()->all(), 'id','name'),['prompt'=>'Select Your Country','id'=>'countryid'])  ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
