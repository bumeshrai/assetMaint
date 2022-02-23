<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StationEarningSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="station-earning-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'earning_id') ?>

    <?= $form->field($model, 'date_on') ?>

    <?= $form->field($model, 'stn_id') ?>

    <?= $form->field($model, 'cash') ?>

    <?= $form->field($model, 'card') ?>

    <?php // echo $form->field($model, 'voucher') ?>

    <?php // echo $form->field($model, 'web') ?>

    <?php // echo $form->field($model, 'non_fare') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
