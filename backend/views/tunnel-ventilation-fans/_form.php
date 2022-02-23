<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TunnelVentilationFan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tunnel-ventilation-fan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'freq_id')->textInput() ?>

    <?= $form->field($model, 'check_impeller_blade')->textInput() ?>

    <?= $form->field($model, 'check_impeller_wing_root')->textInput() ?>

    <?= $form->field($model, 'impeller_blade_condition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clean_motor_casing')->textInput() ?>

    <?= $form->field($model, 'lubricate_motor')->textInput() ?>

    <?= $form->field($model, 'electrical_insulation')->textInput() ?>

    <?= $form->field($model, 'electrical_terminal')->textInput() ?>

    <?= $form->field($model, 'check_manual_operation')->textInput() ?>

    <?= $form->field($model, 'check_emergency_stop')->textInput() ?>

    <?= $form->field($model, 'check_flexible_connector')->textInput() ?>

    <?= $form->field($model, 'vibration_isolater_level')->textInput() ?>

    <?= $form->field($model, 'physical_inspection')->textInput() ?>

    <?= $form->field($model, 'noise_level_in_db')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fan_vibration_reading')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'blade_tip_clearance_reading')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asset_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maint_type_id')->textInput() ?>

    <?= $form->field($model, 'eng_id')->textInput() ?>

    <?= $form->field($model, 'contractor')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
