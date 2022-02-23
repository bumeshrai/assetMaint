<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Escalator */

$this->title = 'Create Escalator MS';
$this->params['breadcrumbs'][] = ['label' => 'Escalators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escalator-create">

    <?php $form = ActiveForm::begin(); ?> 
    <div class="row">
        <div class="col-lg-6">
            <h1>Escalator Maintenance form</h1>
            <?= $form->field($model, 'freq_id')->dropDownList($this->params['itemMaintenanceFrequency'],
                [   'prompt' => '--- select---' ]) ?>
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
     	</div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end() ?>
</div>
