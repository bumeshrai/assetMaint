<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Vrf */

$this->title = 'Create VRF';
$this->params['breadcrumbs'][] = ['label' => 'VRFs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vrf-create">

    <?php $form = ActiveForm::begin(); ?> 
    <div class="row">
        <div class="col-lg-6">
            <h1>VRF's Maintenance form</h1>
            <?= $form->field($model, 'freq_id')->dropDownList($this->params['itemMaintenanceFrequency'],
                [   'prompt' => '--- select---' ]) ?>
            <?= $form->field($model, 'weekly_cleaning')->checkbox() ?>
            <?= $form->field($model, 'monthly_cleaning')->checkbox() ?>
            <?= $form->field($model, 'quarterly_cleaning')->checkbox() ?>
            <?= $form->field($model, 'annually_cleaning')->checkbox() ?>
            <?= $form->field($model, 'monthly_functional_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_functional_check')->checkbox() ?>
            <?= $form->field($model, 'monthly_record_the_readings')->checkbox() ?>
            <?= $form->field($model, 'quarterly_sensible_check')->checkbox() ?>
            <?= $form->field($model, 'weekly_lubrication_check')->checkbox() ?>
            <?= $form->field($model, 'weekly_electrical_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_electrical_check')->checkbox() ?>
            <?= $form->field($model, 'annually_electrical_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_mechanical_check')->checkbox() ?>
     	</div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end() ?>
</div>
