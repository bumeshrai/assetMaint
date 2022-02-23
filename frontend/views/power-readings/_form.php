<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PowerReading */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="power-reading-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_on')->textInput() ?>

    <?= $form->field($model, 'supply')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receiving_station')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active_power')->textInput() ?>

    <?= $form->field($model, 'total_power')->textInput() ?>

    <?= $form->field($model, 'maximum_demand')->textInput() ?>

    <?= $form->field($model, 'power_factor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
