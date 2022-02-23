<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BreakdownSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="breakdown-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bd_id') ?>

    <?= $form->field($model, 'asset_code') ?>

    <?= $form->field($model, 'reported_by') ?>

    <?= $form->field($model, 'attended') ?>

    <?= $form->field($model, 'reporting_time') ?>

    <?php // echo $form->field($model, 'attended_by') ?>

    <?php // echo $form->field($model, 'repaired_time') ?>

    <?php // echo $form->field($model, 'bd_description') ?>

    <?php // echo $form->field($model, 'repair_description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
