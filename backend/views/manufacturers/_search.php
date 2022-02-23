<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ManufacturerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manufacturer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'manuf_id') ?>

    <?= $form->field($model, 'ename_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'country') ?>

    <?= $form->field($model, 'contact_person') ?>

    <?php // echo $form->field($model, 'contact_phone') ?>

    <?php // echo $form->field($model, 'contact_email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
