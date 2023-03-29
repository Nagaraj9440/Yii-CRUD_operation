<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Standard;
use common\models\Country;
use common\models\State;
use common\models\District;
use common\models\Taluk;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;

/** @var yii\web\View $this */
/** @var common\models\Students $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'standard_id')->label('Standard')->textInput()->dropDownList(ArrayHelper::map(Standard::find()->all(), 'id','name'),['prompt'=>'Select Your Standard','id'=>'Standardid'])  ?>

    <?= $form->field($model, 'country_id')->label('Country')->textInput()->dropDownList(ArrayHelper::map(Country::find()->all(), 'id','name'),['prompt'=>'Select Your Country','id'=>'countryid'])  ?>
    
    <?= $form->field($model, 'state_id')->label('State')->widget(DepDrop::classname(), [
    'options'=>['id'=>'student-state_id','prompt'=>'Select State','id'=>'stateid'],
    'pluginOptions'=>[
        'depends'=>['countryid'],
        'placeholder'=>'Select State...',
        'url'=>Url::to(['/student/state'])
    ]
]);?>
    <?= $form->field($model, 'district_id')->label('District')->widget(DepDrop::classname(), [
    'options'=>['id'=>'student-district_id','prompt'=>'Select District','id'=>'districtid'],
    'pluginOptions'=>[
        'depends'=>['stateid'],
        'placeholder'=>'Select District...',
        'url'=>Url::to(['/student/district'])
       ]]);
        ?>

    <?= $form->field($model, 'taluk_id')->label('Taluk')->widget(DepDrop::classname(), [
    'options'=>['id'=>'student-taluk_id','prompt'=>'Select Taluk'],
    'pluginOptions'=>[
        'depends'=>['districtid'],
        'placeholder'=>'Select Taluk...',
        'url'=>Url::to(['/student/taluk'])
       ]]);
        ?><br>

      <?= $form->field($model, 'student_image')->fileInput() ?>
      

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
