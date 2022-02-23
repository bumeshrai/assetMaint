<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Chiller */

$this->title = 'Create Chiller';
$this->params['breadcrumbs'][] = ['label' => 'Chillers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chiller-create">

    <?php $form = ActiveForm::begin(); ?> 
    <div class="row">
        <div class="col-lg-6">
            <h1>Chiller Maintenance form</h1>
            <?= $form->field($model, 'freq_id')->dropDownList($this->params['itemMaintenanceFrequency'],
                [   'prompt' => '--- select---' ]) ?>
            <?= $form->field($model, 'quarterly_functional_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_leak_testing_check')->checkbox() ?>
            <?= $form->field($model, 'daily_record_the_reading')->checkbox() ?>
            <?= $form->field($model, 'quarterly_record_the_reading')->checkbox() ?>
            <?= $form->field($model, 'quarterly_sensible_check')->checkbox() ?>
            <?= $form->field($model, 'quarterly_electrical_check')->checkbox() ?>
     	</div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end() ?>

</div>
