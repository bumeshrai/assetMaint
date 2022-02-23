<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EquipmentName */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-name-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ename_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maint_daily')->textInput() ?>

    <?= $form->field($model, 'maint_weekly')->textInput() ?>

    <?= $form->field($model, 'maint_fortnightly')->textInput() ?>

    <?= $form->field($model, 'maint_monthly')->textInput() ?>

    <?= $form->field($model, 'maint_quaterly')->textInput() ?>

    <?= $form->field($model, 'maint_biannual')->textInput() ?>

    <?= $form->field($model, 'maint_annual')->textInput() ?>

    <?= $form->field($model, 'maint_biennial')->textInput() ?>

    <?= $form->field($model, 'maint_triennial')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
