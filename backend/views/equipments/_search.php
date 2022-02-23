<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EquipmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'equip_id') ?>

    <?= $form->field($model, 'corr_id') ?>

    <?= $form->field($model, 'ename_id') ?>

    <?= $form->field($model, 'manuf_id') ?>

    <?= $form->field($model, 'enos_id') ?>

    <?php // echo $form->field($model, 'level_id') ?>

    <?php // echo $form->field($model, 'stn_id') ?>

    <?php // echo $form->field($model, 'installation_date') ?>

    <?php // echo $form->field($model, 'asset_code') ?>

    <?php // echo $form->field($model, 'last_major_overhaul') ?>

    <?php // echo $form->field($model, 'last_minor_maintenance') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
