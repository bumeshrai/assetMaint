<?php

/**
 * Create view for Maintenance Next Dues model. 
 * The model tracks all the scheduled maintenance for the asset. 
 *
 * B. Umesh Rai
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TunnelVentilationFan */

$this->title = 'Enter Maintenance Schedule';
$this->params['breadcrumbs'][] = ['label' => 'Equipment Maintenance Schedule', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?> 
<div class="row">
    <div class="col-lg-6">
        <h1>Maintenance Schedule</h1>
        <!-- Get the asset code of the equipment -->
        <?= $form->field($model, 'asset_code')->dropDownList($this->params['itemEquipment'],
            [   'prompt' => '--- select ---' ]) ?>
        <!-- Name of the controller for the equipment will be stored here. -->
        <?= $form->field($model, 'controller')->dropDownList($this->params['itemLocateApiController'],
            [   'prompt' => '--- select ---' ]) ?>
        <!-- Store the due date for periodic maintenances -->
        <?= $form->field($model, 'maint_daily')->input('date') ?>   
        <?= $form->field($model, 'maint_weekly')->input('date') ?>   
        <?= $form->field($model, 'maint_fortnightly')->input('date') ?>   
        <?= $form->field($model, 'maint_monthly')->input('date') ?>   
        <?= $form->field($model, 'maint_quaterly')->input('date') ?>   
        <?= $form->field($model, 'maint_biannual')->input('date') ?>   
        <?= $form->field($model, 'maint_annual')->input('date') ?>   
        <?= $form->field($model, 'maint_biennial')->input('date') ?>   
        <?= $form->field($model, 'maint_triennial')->input('date') ?>   
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
</div>
