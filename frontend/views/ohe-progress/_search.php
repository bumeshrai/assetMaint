<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OheProgresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ohe-progress-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ohe_id') ?>

    <?= $form->field($model, 'section') ?>

    <?= $form->field($model, 'direction') ?>

    <?= $form->field($model, 'tension_number') ?>

    <?= $form->field($model, 'tension_length') ?>

    <?php // echo $form->field($model, 'expansion_joint_total') ?>

    <?php // echo $form->field($model, 'expansion_joint_completed') ?>

    <?php // echo $form->field($model, 'marking_total') ?>

    <?php // echo $form->field($model, 'marking_completed') ?>

    <?php // echo $form->field($model, 'bolt_total') ?>

    <?php // echo $form->field($model, 'bolt_completed') ?>

    <?php // echo $form->field($model, 'bracket_total') ?>

    <?php // echo $form->field($model, 'bracket_completed') ?>

    <?php // echo $form->field($model, 'rail_total') ?>

    <?php // echo $form->field($model, 'rail_completed') ?>

    <?php // echo $form->field($model, 'contact_wire_total') ?>

    <?php // echo $form->field($model, 'contact_wire_completed') ?>

    <?php // echo $form->field($model, 'aec_erection_total') ?>

    <?php // echo $form->field($model, 'aec_erection_completed') ?>

    <?php // echo $form->field($model, 'aec_clamping_total') ?>

    <?php // echo $form->field($model, 'aec_clamping_completed') ?>

    <?php // echo $form->field($model, 'bec_laying_total') ?>

    <?php // echo $form->field($model, 'bec_laying_completed') ?>

    <?php // echo $form->field($model, 'work_completed') ?>

    <?php // echo $form->field($model, 'date_to_finish') ?>

    <?php // echo $form->field($model, 'date_finished') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
