<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\VacFan */

$this->title = 'Create Vac Fan';
$this->params['breadcrumbs'][] = ['label' => 'VAC Fans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vac-fan-create">

    <?php $form = ActiveForm::begin(); ?> 
    <div class="row">
        <div class="col-lg-6">
            <h1>Escalator VAC Fan form</h1>
            <?= $form->field($model, 'freq_id')->dropDownList($this->params['itemMaintenanceFrequency'],
                [   'prompt' => '--- select---' ]) ?>
            <?= $form->field($model, 'quarterly_cleaning')->checkbox() ?>
            <?= $form->field($model, 'quarterly_electrical_check')->checkbox() ?>
     	</div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end() ?>
</div>
