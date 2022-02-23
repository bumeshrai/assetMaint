<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Equipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'corr_id')->textInput() ?>

    <?= $form->field($model, 'ename_id')->textInput() ?>

    <?= $form->field($model, 'manuf_id')->textInput() ?>

    <?= $form->field($model, 'enos_id')->textInput() ?>

    <?= $form->field($model, 'level_id')->textInput() ?>

    <?= $form->field($model, 'stn_id')->textInput() ?>

    <?= $form->field($model, 'installation_date')->textInput() ?>

    <?= $form->field($model, 'asset_code')->textInput() ?>

    <?= $form->field($model, 'last_major_overhaul')->textInput() ?>

    <?= $form->field($model, 'last_minor_maintenance')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
