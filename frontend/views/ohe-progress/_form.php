<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OheProgress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ohe-progress-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'section')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tension_number')->textInput() ?>

    <?= $form->field($model, 'tension_length')->textInput() ?>

    <?= $form->field($model, 'expansion_joint_total')->textInput() ?>

    <?= $form->field($model, 'expansion_joint_completed')->textInput() ?>

    <?= $form->field($model, 'marking_total')->textInput() ?>

    <?= $form->field($model, 'marking_completed')->textInput() ?>

    <?= $form->field($model, 'bolt_total')->textInput() ?>

    <?= $form->field($model, 'bolt_completed')->textInput() ?>

    <?= $form->field($model, 'bracket_total')->textInput() ?>

    <?= $form->field($model, 'bracket_completed')->textInput() ?>

    <?= $form->field($model, 'rail_total')->textInput() ?>

    <?= $form->field($model, 'rail_completed')->textInput() ?>

    <?= $form->field($model, 'contact_wire_total')->textInput() ?>

    <?= $form->field($model, 'contact_wire_completed')->textInput() ?>

    <?= $form->field($model, 'aec_erection_total')->textInput() ?>

    <?= $form->field($model, 'aec_erection_completed')->textInput() ?>

    <?= $form->field($model, 'aec_clamping_total')->textInput() ?>

    <?= $form->field($model, 'aec_clamping_completed')->textInput() ?>

    <?= $form->field($model, 'bec_laying_total')->textInput() ?>

    <?= $form->field($model, 'bec_laying_completed')->textInput() ?>

    <?= $form->field($model, 'met_fixing_total')->textInput() ?>

    <?= $form->field($model, 'met_fixing_completed')->textInput() ?>

    <?= $form->field($model, 'bracket_adjustment')->textInput()->checkbox() ?>

    <?= $form->field($model, 'stagger_adjustment')->textInput()->checkbox() ?>

    <?= $form->field($model, 'work_completed')->textInput()->checkbox() ?>

    <?= $form->field($model, 'under_progress')->textInput()->checkbox() ?>

    <?= $form->field($model, 'date_to_finish')->input('date') ?>

    <?= $form->field($model, 'date_finished')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
