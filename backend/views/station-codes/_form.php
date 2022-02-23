<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StationCode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="station-code-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'station_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'station_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'corr_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
