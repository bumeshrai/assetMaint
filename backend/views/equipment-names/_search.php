<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EquipmentNameSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-name-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ename_id') ?>

    <?= $form->field($model, 'ename_name') ?>

    <?= $form->field($model, 'maint_daily') ?>

    <?= $form->field($model, 'maint_weekly') ?>

    <?= $form->field($model, 'maint_fortnightly') ?>

    <?php // echo $form->field($model, 'maint_monthly') ?>

    <?php // echo $form->field($model, 'maint_quaterly') ?>

    <?php // echo $form->field($model, 'maint_biannual') ?>

    <?php // echo $form->field($model, 'maint_annual') ?>

    <?php // echo $form->field($model, 'maint_biennial') ?>

    <?php // echo $form->field($model, 'maint_triennial') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
