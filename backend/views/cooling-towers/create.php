<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\CoolingTower */

$this->title = 'Create Cooling Tower';
$this->params['breadcrumbs'][] = ['label' => 'Cooling Towers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cooling-tower-create">

    <?php $form = ActiveForm::begin(); ?> 
    <div class="row">
        <div class="col-lg-6">
            <h1>Cooling Tower Maintenance form</h1>
            <?= $form->field($model, 'freq_id')->dropDownList($this->params['itemMaintenanceFrequency'],
                [   'prompt' => '--- select---' ]) ?>
            <?= $form->field($model, 'monthly_cleaning')->checkbox() ?>
            <?= $form->field($model, 'quarterly_cleaning')->checkbox() ?>
            <?= $form->field($model, 'daily_sensible_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_sensible_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_lubrication_check')->checkbox() ?>
            <?= $form->field($model, 'monthly_electrical_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_electrical_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_mechanical_check')->checkbox() ?>
     	</div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end() ?>
</div>
