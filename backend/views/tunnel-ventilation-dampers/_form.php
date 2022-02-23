<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TunnelVentilationDamper */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tunnel-ventilation-damper-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'freq_id')->textInput() ?>

    <?= $form->field($model, 'actuator_cam_check')->textInput() ?>

    <?= $form->field($model, 'actuator_cam_setting')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'blades_cleaned')->textInput() ?>

    <?= $form->field($model, 'linkages_check')->textInput() ?>

    <?= $form->field($model, 'linkage_moving_smooth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manual_close_open_check')->textInput() ?>

    <?= $form->field($model, 'actuator_spring_tightness')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'frame_nuts_tightness_check')->textInput() ?>

    <?= $form->field($model, 'frame_corroded')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'actuator_wiring_ok')->textInput() ?>

    <?= $form->field($model, 'blades_open_alignment_ok')->textInput() ?>

    <?= $form->field($model, 'blades_close_alignment_ok')->textInput() ?>

    <?= $form->field($model, 'close_open_sound')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'limit_switch_signal_check')->textInput() ?>

    <?= $form->field($model, 'physical_inspection')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asset_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maint_type_id')->textInput() ?>

    <?= $form->field($model, 'eng_id')->textInput() ?>

    <?= $form->field($model, 'contractor')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
