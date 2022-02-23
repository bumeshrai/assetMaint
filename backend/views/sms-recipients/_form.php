<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SmsRecipient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sms-recipient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ename_id')->textInput() ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
