<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PowerReadingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="power-reading-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'reading_id') ?>

    <?= $form->field($model, 'date_on') ?>

    <?= $form->field($model, 'supply') ?>

    <?= $form->field($model, 'receiving_station') ?>

    <?= $form->field($model, 'active_power') ?>

    <?php // echo $form->field($model, 'total_power') ?>

    <?php // echo $form->field($model, 'maximum_demand') ?>

    <?php // echo $form->field($model, 'power_factor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
