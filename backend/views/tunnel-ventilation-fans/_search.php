<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TunnelVentilationFanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tunnel-ventilation-fan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tvf_id') ?>

    <?= $form->field($model, 'freq_id') ?>

    <?= $form->field($model, 'check_impeller_blade') ?>

    <?= $form->field($model, 'check_impeller_wing_root') ?>

    <?= $form->field($model, 'impeller_blade_condition') ?>

    <?php // echo $form->field($model, 'clean_motor_casing') ?>

    <?php // echo $form->field($model, 'lubricate_motor') ?>

    <?php // echo $form->field($model, 'electrical_insulation') ?>

    <?php // echo $form->field($model, 'electrical_terminal') ?>

    <?php // echo $form->field($model, 'check_manual_operation') ?>

    <?php // echo $form->field($model, 'check_emergency_stop') ?>

    <?php // echo $form->field($model, 'check_flexible_connector') ?>

    <?php // echo $form->field($model, 'vibration_isolater_level') ?>

    <?php // echo $form->field($model, 'physical_inspection') ?>

    <?php // echo $form->field($model, 'noise_level_in_db') ?>

    <?php // echo $form->field($model, 'fan_vibration_reading') ?>

    <?php // echo $form->field($model, 'blade_tip_clearance_reading') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'asset_code') ?>

    <?php // echo $form->field($model, 'maint_type_id') ?>

    <?php // echo $form->field($model, 'eng_id') ?>

    <?php // echo $form->field($model, 'contractor') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
