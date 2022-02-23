<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Lift */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lift-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'freq_id')->textInput() ?>

            <?= $form->field($model, 'monthly_cleaning_list')->checkbox() ?>
            <?= $form->field($model, 'quaterly_cleaning_list')->checkbox() ?>
            <?= $form->field($model, 'halfyearly_cleaning_list')->checkbox() ?>
            <?= $form->field($model, 'lubricate')->checkbox() ?>
            <?= $form->field($model, 'monthly_visual_check')->checkbox() ?>
            <?= $form->field($model, 'halfyearly_visual_check')->checkbox() ?>
            <?= $form->field($model, 'annual_visual_check')->checkbox() ?>
            <?= $form->field($model, 'monthly_hoistway_inspection')->checkbox() ?>
            <?= $form->field($model, 'quaterly_hoistway_inspection')->checkbox() ?>
            <?= $form->field($model, 'halfyearly_hoistway_inspection')->checkbox() ?>
            <?= $form->field($model, 'monthly_door_inspection')->checkbox() ?>
            <?= $form->field($model, 'quaterly_door_inspection')->checkbox() ?>
            <?= $form->field($model, 'monthly_car_cabin_inspection')->checkbox() ?>
            <?= $form->field($model, 'annual_car_cabin_inspection')->checkbox() ?>
            <?= $form->field($model, 'monthly_safety_function')->checkbox() ?>
            <?= $form->field($model, 'halfyearly_safety_function')->checkbox() ?>
            <?= $form->field($model, 'annual_safety_function')->checkbox() ?>

            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'asset_code')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'maint_type_id')->textInput() ?>
            <?= $form->field($model, 'eng_id')->textInput() ?>
            <?= $form->field($model, 'contractor')->textInput() ?>
            <?= $form->field($model, 'created_at')->textInput() ?>
            <?= $form->field($model, 'updated_at')->textInput() ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
