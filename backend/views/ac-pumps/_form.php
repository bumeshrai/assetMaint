<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AcPump */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ac-pump-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">

            <!-- <?= $form->field($model, 'ac_pump_id')->textInput() ?> -->

            <?= $form->field($model, 'freq_id')->textInput() ?>
            
            <?= $form->field($model, 'monthly_cleaning')->checkbox() ?>
            <?= $form->field($model, 'quarterly_cleaning')->checkbox() ?>
            <?= $form->field($model, 'quarterly_leak_testing')->checkbox() ?>
            <?= $form->field($model, 'quarterly_record_the_reading')->checkbox() ?>
            <?= $form->field($model, 'monthly_sensible_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_sensible_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_lubrication_check')->checkbox() ?>
            <?= $form->field($model, 'monthly_electrical_check')->checkbox() ?>
            <?= $form->field($model, 'halfyearly_electrical_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_mechanical_check')->checkbox() ?>

            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'asset_code')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'maint_type_id')->textInput() ?>
            <?= $form->field($model, 'eng_id')->textInput() ?>
            <?= $form->field($model, 'contractor')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'created_at')->textInput() ?>
            <?= $form->field($model, 'updated_at')->textInput() ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
