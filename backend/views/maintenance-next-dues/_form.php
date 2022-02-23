<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MaintenanceNextDue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maintenance-next-due-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'asset_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'controller')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maint_daily')->input('date') ?>

    <?= $form->field($model, 'maint_weekly')->input('date') ?>

    <?= $form->field($model, 'maint_fortnightly')->input('date') ?>

    <?= $form->field($model, 'maint_monthly')->input('date') ?>

    <?= $form->field($model, 'maint_quaterly')->input('date') ?>

    <?= $form->field($model, 'maint_biannual')->input('date') ?>

    <?= $form->field($model, 'maint_annual')->input('date') ?>

    <?= $form->field($model, 'maint_biennial')->input('date') ?>

    <?= $form->field($model, 'maint_triennial')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
