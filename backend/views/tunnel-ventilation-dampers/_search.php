<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TunnelVentilationDamperSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tunnel-ventilation-damper-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tvd_id') ?>

    <?= $form->field($model, 'freq_id') ?>

    <?= $form->field($model, 'actuator_cam_check') ?>

    <?= $form->field($model, 'actuator_cam_setting') ?>

    <?= $form->field($model, 'blades_cleaned') ?>

    <?php // echo $form->field($model, 'linkages_check') ?>

    <?php // echo $form->field($model, 'linkage_moving_smooth') ?>

    <?php // echo $form->field($model, 'manual_close_open_check') ?>

    <?php // echo $form->field($model, 'actuator_spring_tightness') ?>

    <?php // echo $form->field($model, 'frame_nuts_tightness_check') ?>

    <?php // echo $form->field($model, 'frame_corroded') ?>

    <?php // echo $form->field($model, 'actuator_wiring_ok') ?>

    <?php // echo $form->field($model, 'blades_open_alignment_ok') ?>

    <?php // echo $form->field($model, 'blades_close_alignment_ok') ?>

    <?php // echo $form->field($model, 'close_open_sound') ?>

    <?php // echo $form->field($model, 'limit_switch_signal_check') ?>

    <?php // echo $form->field($model, 'physical_inspection') ?>

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
