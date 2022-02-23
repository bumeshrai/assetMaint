<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StationCodeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="station-code-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'stn_id') ?>

    <?= $form->field($model, 'station_name') ?>

    <?= $form->field($model, 'station_code') ?>

    <?= $form->field($model, 'corr_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
