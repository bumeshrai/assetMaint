<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Chiller */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chiller-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">

            <!-- <?= $form->field($model, 'chiller_id')->textInput() ?> -->

            <?= $form->field($model, 'freq_id')->textInput() ?>

            <?= $form->field($model, 'quarterly_functional_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_leak_testing_check')->checkbox() ?>
            <?= $form->field($model, 'daily_record_the_reading')->checkbox() ?>
            <?= $form->field($model, 'quarterly_record_the_reading')->checkbox() ?>
            <?= $form->field($model, 'quarterly_sensible_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_electrical_check')->checkbox() ?>

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
