<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StationEarning */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="station-earning-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_on')->textInput() ?>

    <?= $form->field($model, 'stn_id')->textInput() ?>

    <?= $form->field($model, 'cash')->textInput() ?>

    <?= $form->field($model, 'card')->textInput() ?>

    <?= $form->field($model, 'voucher')->textInput() ?>

    <?= $form->field($model, 'web')->textInput() ?>

    <?= $form->field($model, 'non_fare')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
