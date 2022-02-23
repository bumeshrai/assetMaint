<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Ahu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ahu-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">

            <!-- <?= $form->field($model, 'ahu_id')->textInput() ?> -->

            <?= $form->field($model, 'freq_id')->textInput() ?>

            <?= $form->field($model, 'weekly_cleaning')->checkbox() ?>
            <?= $form->field($model, 'quarterly_cleaning')->checkbox() ?>
            <?= $form->field($model, 'annually_cleaning')->checkbox() ?>
            <?= $form->field($model, 'daily_record_the_readings')->checkbox() ?>
            <?= $form->field($model, 'halfyearly_record_the_readings')->checkbox() ?>
            <?= $form->field($model, 'halfyearly_sensible_check')->checkbox() ?>
            <?= $form->field($model, 'annually_sensible_check')->checkbox() ?>
            <?= $form->field($model, 'monthly_tightness_check')->checkbox() ?>
            <?= $form->field($model, 'annually_tightness_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_lubircation')->checkbox() ?>
            <?= $form->field($model, 'quarterly_electrical_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_mechanical_check')->checkbox() ?>
            <?= $form->field($model, 'halfyearly_mechanical_check')->checkbox() ?>

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
