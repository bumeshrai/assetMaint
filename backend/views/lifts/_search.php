<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LiftSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lift-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lift_id') ?>

    <?= $form->field($model, 'freq_id') ?>

    <?= $form->field($model, 'monthly_cleaning_list') ?>

    <?= $form->field($model, 'quaterly_cleaning_list') ?>

    <?= $form->field($model, 'halfyearly_cleaning_list') ?>

    <?php // echo $form->field($model, 'lubricate') ?>

    <?php // echo $form->field($model, 'monthly_visual_check') ?>

    <?php // echo $form->field($model, 'halfyearly_visual_check') ?>

    <?php // echo $form->field($model, 'annual_visual_check') ?>

    <?php // echo $form->field($model, 'monthly_hoistway_inspection') ?>

    <?php // echo $form->field($model, 'quaterly_hoistway_inspection') ?>

    <?php // echo $form->field($model, 'halfyearly_hoistway_inspection') ?>

    <?php // echo $form->field($model, 'monthly_door_inspection') ?>

    <?php // echo $form->field($model, 'quaterly_door_inspection') ?>

    <?php // echo $form->field($model, 'monthly_car_cabin_inspection') ?>

    <?php // echo $form->field($model, 'annual_car_cabin_inspection') ?>

    <?php // echo $form->field($model, 'monthly_safety_function') ?>

    <?php // echo $form->field($model, 'halfyearly_safety_function') ?>

    <?php // echo $form->field($model, 'annual_safety_function') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'asset_code') ?>

    <?php // echo $form->field($model, 'maint_type_id') ?>

    <?php // echo $form->field($model, 'eng_id') ?>

    <?php // echo $form->field($model, 'contractor') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
