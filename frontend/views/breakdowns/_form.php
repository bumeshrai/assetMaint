<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Breakdown */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="breakdown-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'asset_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reported_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attended')->textInput() ?>

    <?= $form->field($model, 'reporting_time')->textInput() ?>

    <?= $form->field($model, 'attended_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repaired_time')->textInput() ?>

    <?= $form->field($model, 'bd_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'repair_description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
