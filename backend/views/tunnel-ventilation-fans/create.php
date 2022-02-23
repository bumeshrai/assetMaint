<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TunnelVentilationFan */

$this->title = 'TVF Maintenance Sheet';
$this->params['breadcrumbs'][] = ['label' => 'Tunnel Ventilation Fans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?> 
<div class="row">
    <div class="col-lg-6">
        <h1>TVF Maintenance form</h1>
        <?= $form->field($model, 'freq_id')->dropDownList($this->params['itemMaintenanceFrequency'],
            [   'prompt' => '--- select---' ]) ?>
        <?= $form->field($model,'check_impeller_blade')->checkbox()  ?>
        <?= $form->field($model,'check_impeller_wing_root')->checkbox()  ?>
        <?= $form->field($model,'impeller_blade_condition')  ?>
        <?= $form->field($model,'clean_motor_casing')->checkbox()  ?>
        <?= $form->field($model,'lubricate_motor')->checkbox()  ?>
        <?= $form->field($model,'electrical_insulation')->checkbox()  ?>
        <?= $form->field($model,'electrical_terminal')->checkbox()  ?>
        <?= $form->field($model,'check_manual_operation')->checkbox()  ?>
        <?= $form->field($model,'check_emergency_stop')->checkbox()   ?>
        <?= $form->field($model,'check_flexible_connector')->checkbox()   ?>
        <?= $form->field($model,'vibration_isolater_level')->checkbox()  ?>
        <?= $form->field($model,'noise_level_in_db')  ?>
        <?= $form->field($model,'fan_vibration_reading')  ?>
        <?= $form->field($model,'blade_tip_clearance_reading')  ?>
        <?= $form->field($model,'physical_inspection')->checkbox()  ?>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
</div>
