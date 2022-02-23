<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Ahu */

$this->title = 'Create AHU';
$this->params['breadcrumbs'][] = ['label' => 'AHUs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ahu-create">

    <?php $form = ActiveForm::begin(); ?> 
    <div class="row">
        <div class="col-lg-6">
            <h1>AHU Maintenance form</h1>
            <?= $form->field($model, 'freq_id')->dropDownList($this->params['itemMaintenanceFrequency'],
                [   'prompt' => '--- select---' ]) ?>
            <?= $form->field($model, 'weekly_cleaning')->checkbox() ?>
            <?= $form->field($model, 'quarterly_cleaning')->checkbox() ?>
            <?= $form->field($model, 'annually_cleaning')->checkbox() ?>
            <?= $form->field($model, 'daily_record_the_readings')->checkbox() ?>
            <?= $form->field($model, 'halfyearly_record_the_readings')->checkbox() ?>
            <?= $form->field($model, 'halfyearly_sensible_check')->checkbox() ?>
            <?= $form->field($model, 'annually_sensible_check')->checkbox() ?>
            <?= $form->field($model, 'monthly_tightness_check')->checkbox() ?>
            <?= $form->field($model, 'annually_tightness_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_lubircation')->checkbox() ?>
            <?= $form->field($model, 'quarterly_electrical_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_mechanical_check')->checkbox() ?>
            <?= $form->field($model, 'halfyearly_mechanical_check')->checkbox() ?>
     	</div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end() ?>
