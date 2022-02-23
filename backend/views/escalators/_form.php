<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Escalator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="escalator-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">

            <?= $form->field($model, 'freq_id')->textInput() ?>

            <?= $form->field($model,'clean_component_list')->checkbox()  ?>
            <?= $form->field($model,'lubricate_chains')->checkbox()  ?>
            <?= $form->field($model,'grease_shaft_bushes')->checkbox()  ?>
            <?= $form->field($model,'quaterly_visual_check')->checkbox()  ?>
            <?= $form->field($model,'halfyearly_visual_check')->checkbox()  ?>
            <?= $form->field($model,'annual_visual_check')->checkbox()  ?>
            <?= $form->field($model,'monthly_step_inspection')->checkbox()  ?>
            <?= $form->field($model,'quaterly_step_inspection')->checkbox()  ?>
            <?= $form->field($model,'halfyearly_step_inspection')->checkbox()  ?>
            <?= $form->field($model,'annual_step_inspection')->checkbox()  ?>
            <?= $form->field($model,'monthly_step_chain_inspection')->checkbox()  ?>
            <?= $form->field($model,'halfyearly_step_chain_inspection')->checkbox()  ?>
            <?= $form->field($model,'annual_step_chain_inspection')->checkbox()  ?>
            <?= $form->field($model,'monthly_comb_inspection')->checkbox()  ?>
            <?= $form->field($model,'annual_comb_inspection')->checkbox()  ?>
            <?= $form->field($model,'handrail_inspection')->checkbox()  ?>
            <?= $form->field($model,'drive_chain_inspection')->checkbox()  ?>
            <?= $form->field($model,'monthly_machinery_inspection')->checkbox()  ?>
            <?= $form->field($model,'halfyearly_machinery_inspection')->checkbox()  ?>
            <?= $form->field($model,'annual_machinery_inspection')->checkbox()  ?>
            <?= $form->field($model,'monthly_brake_inspection')->checkbox()  ?>
            <?= $form->field($model,'halfyearly_brake_inspection')->checkbox()  ?>
            <?= $form->field($model,'monthly_safety_function')->checkbox()  ?>
            <?= $form->field($model,'halfyearly_safety_function')->checkbox()  ?>
            <?= $form->field($model,'monthly_operative_function')->checkbox()  ?>
            <?= $form->field($model,'halfyearly_operative_function')->checkbox()  ?>
            <?= $form->field($model,'annual_operative_function')->checkbox()  ?>
            
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'asset_code')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'maint_type_id')->textInput() ?>
            <?= $form->field($model, 'eng_id')->textInput() ?>
            <?= $form->field($model, 'contractor')->textInput() ?>
            <?= $form->field($model, 'created_at')->textInput() ?>
            <?= $form->field($model, 'updated_at')->textInput() ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
