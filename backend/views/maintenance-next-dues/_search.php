<?php

/**
 * Search view for Maintenance Next Dues model. 
 * The model tracks all the scheduled maintenance for the asset. 
 *
 * B. Umesh Rai
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MaintenanceNextDueSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maintenance-next-due-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'asset_code') ?>

    <?php // echo  $form->field($model, 'controller') ?>

    <?php // echo  $form->field($model, 'maint_daily') ?>

    <?php // echo  $form->field($model, 'maint_weekly') ?>

    <?php // echo $form->field($model, 'maint_fortnightly') ?>

    <?= $form->field($model, 'maint_monthly') ?>

    <?= $form->field($model, 'maint_quaterly') ?>

    <?= $form->field($model, 'maint_biannual') ?>

    <?= $form->field($model, 'maint_annual') ?>

    <?php // echo $form->field($model, 'maint_biennial') ?>

    <?php // echo $form->field($model, 'maint_triennial') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
