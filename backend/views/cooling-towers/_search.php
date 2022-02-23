<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CoolingTowerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cooling-tower-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cooling_tower_id') ?>

    <?= $form->field($model, 'freq_id') ?>

    <?= $form->field($model, 'monthly_cleaning') ?>

    <?= $form->field($model, 'quarterly_cleaning') ?>

    <?= $form->field($model, 'daily_sensible_check') ?>

    <?php // echo $form->field($model, 'quarterly_sensible_check') ?>

    <?php // echo $form->field($model, 'quarterly_lubrication_check') ?>

    <?php // echo $form->field($model, 'monthly_electrical_check') ?>

    <?php // echo $form->field($model, 'quarterly_electrical_check') ?>

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
