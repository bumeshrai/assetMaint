<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VrfSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vrf-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vrf_id') ?>

    <?= $form->field($model, 'freq_id') ?>

    <?= $form->field($model, 'weekly_cleaning') ?>

    <?= $form->field($model, 'monthly_cleaning') ?>

    <?= $form->field($model, 'quarterly_cleaning') ?>

    <?php // echo $form->field($model, 'annually_cleaning') ?>

    <?php // echo $form->field($model, 'monthly_functional_check') ?>

    <?php // echo $form->field($model, 'quarterly_functional_check') ?>

    <?php // echo $form->field($model, 'monthly_record_the_readings') ?>

    <?php // echo $form->field($model, 'quarterly_sensible_check') ?>

    <?php // echo $form->field($model, 'weekly_lubrication_check') ?>

    <?php // echo $form->field($model, 'weekly_electrical_check') ?>

    <?php // echo $form->field($model, 'quarterly_electrical_check') ?>

    <?php // echo $form->field($model, 'annually_electrical_check') ?>

    <?php // echo $form->field($model, 'quarterly_mechanical_check') ?>

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
