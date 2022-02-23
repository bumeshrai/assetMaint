<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\VacElectricalPanel */

$this->title = 'Create VAC Electrical Panel';
$this->params['breadcrumbs'][] = ['label' => 'VAC Electrical Panels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vac-electrical-panel-create">

    <?php $form = ActiveForm::begin(); ?> 
    <div class="row">
        <div class="col-lg-6">
            <h1>VAC Electrical Panel Maintenance form</h1>
            <?= $form->field($model, 'freq_id')->dropDownList($this->params['itemMaintenanceFrequency'],
                [   'prompt' => '--- select---' ]) ?>
            <?= $form->field($model, 'monthly_record_the_reading')->checkbox() ?>
            <?= $form->field($model, 'quartely_electrical_check')->checkbox() ?>
     	</div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end() ?>
</div>
