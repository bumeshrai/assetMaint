<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EscalatorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="escalator-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'escl_id') ?>

    <?= $form->field($model, 'freq_id') ?>

    <?= $form->field($model, 'clean_component_list') ?>

    <?= $form->field($model, 'lubricate_chains') ?>

    <?= $form->field($model, 'grease_shaft_bushes') ?>

    <?php // echo $form->field($model, 'quaterly_visual_check') ?>

    <?php // echo $form->field($model, 'halfyearly_visual_check') ?>

    <?php // echo $form->field($model, 'annual_visual_check') ?>

    <?php // echo $form->field($model, 'monthly_step_inspection') ?>

    <?php // echo $form->field($model, 'quaterly_step_inspection') ?>

    <?php // echo $form->field($model, 'halfyearly_step_inspection') ?>

    <?php // echo $form->field($model, 'annual_step_inspection') ?>

    <?php // echo $form->field($model, 'monthly_step_chain_inspection') ?>

    <?php // echo $form->field($model, 'halfyearly_step_chain_inspection') ?>

    <?php // echo $form->field($model, 'annual_step_chain_inspection') ?>

    <?php // echo $form->field($model, 'monthly_comb_inspection') ?>

    <?php // echo $form->field($model, 'annual_comb_inspection') ?>

    <?php // echo $form->field($model, 'handrail_inspection') ?>

    <?php // echo $form->field($model, 'drive_chain_inspection') ?>

    <?php // echo $form->field($model, 'monthly_machinery_inspection') ?>

    <?php // echo $form->field($model, 'halfyearly_machinery_inspection') ?>

    <?php // echo $form->field($model, 'annual_machinery_inspection') ?>

    <?php // echo $form->field($model, 'monthly_brake_inspection') ?>

    <?php // echo $form->field($model, 'halfyearly_brake_inspection') ?>

    <?php // echo $form->field($model, 'monthly_safety_function') ?>

    <?php // echo $form->field($model, 'halfyearly_safety_function') ?>

    <?php // echo $form->field($model, 'monthly_operative_function') ?>

    <?php // echo $form->field($model, 'halfyearly_operative_function') ?>

    <?php // echo $form->field($model, 'annual_operative_function') ?>

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
