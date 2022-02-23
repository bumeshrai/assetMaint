<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Lift */

$this->title = 'Create Lift MS';
$this->params['breadcrumbs'][] = ['label' => 'Lifts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="lift-create">

    <?php $form = ActiveForm::begin(); ?> 
    <div class="row">
        <div class="col-lg-6">
            <h1>Lift Maintenance form</h1>
            <?= $form->field($model, 'freq_id')->dropDownList($this->params['itemMaintenanceFrequency'],
                [   'prompt' => '--- select---' ]) ?>
		    <?= $form->field($model, 'monthly_cleaning_list')->checkbox() ?>
		    <?= $form->field($model, 'quaterly_cleaning_list')->checkbox() ?>
		    <?= $form->field($model, 'halfyearly_cleaning_list')->checkbox() ?>
		    <?= $form->field($model, 'lubricate')->checkbox() ?>
		    <?= $form->field($model, 'monthly_visual_check')->checkbox() ?>
		    <?= $form->field($model, 'halfyearly_visual_check')->checkbox() ?>
		    <?= $form->field($model, 'annual_visual_check')->checkbox() ?>
		    <?= $form->field($model, 'monthly_hoistway_inspection')->checkbox() ?>
		    <?= $form->field($model, 'quaterly_hoistway_inspection')->checkbox() ?>
		    <?= $form->field($model, 'halfyearly_hoistway_inspection')->checkbox() ?>
		    <?= $form->field($model, 'monthly_door_inspection')->checkbox() ?>
		    <?= $form->field($model, 'quaterly_door_inspection')->checkbox() ?>
		    <?= $form->field($model, 'monthly_car_cabin_inspection')->checkbox() ?>
		    <?= $form->field($model, 'annual_car_cabin_inspection')->checkbox() ?>
		    <?= $form->field($model, 'monthly_safety_function')->checkbox() ?>
		    <?= $form->field($model, 'halfyearly_safety_function')->checkbox() ?>
		    <?= $form->field($model, 'annual_safety_function')->checkbox() ?>
    	</div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end() ?>

</div>
