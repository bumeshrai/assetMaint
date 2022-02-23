<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TunnelVentilationFan */

$this->title = 'TVD Maintenance Sheet';
$this->params['breadcrumbs'][] = ['label' => 'Tunnel Ventilation Dampers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?> 
<div class="row">
    <div class="col-lg-6">
        <h1>TVD Maintenance form</h1>
        <?= $form->field($model, 'freq_id')->dropDownList($this->params['itemMaintenanceFrequency'],
            [   'prompt' => '--- select---' ]) ?>
        <?= $form->field($model,'actuator_cam_check')->checkbox()  ?>
        <?= $form->field($model,'actuator_cam_setting')  ?>
        <?= $form->field($model,'blades_cleaned')->checkbox()  ?>
        <?= $form->field($model,'linkages_check')->checkbox()  ?>
        <?= $form->field($model,'linkage_moving_smooth')  ?>
        <?= $form->field($model,'manual_close_open_check')->checkbox()  ?>
        <?= $form->field($model,'actuator_spring_tightness')  ?>
        <?= $form->field($model,'frame_nuts_tightness_check')->checkbox()  ?>
        <?= $form->field($model,'frame_corroded')  ?>
        <?= $form->field($model,'actuator_wiring_ok')->checkbox()  ?>
        <?= $form->field($model,'blades_open_alignment_ok')->checkbox()  ?>
        <?= $form->field($model,'blades_close_alignment_ok')->checkbox()  ?>
        <?= $form->field($model,'close_open_sound')  ?>
        <?= $form->field($model,'limit_switch_signal_check')->checkbox()  ?>
        <?= $form->field($model,'physical_inspection')->checkbox()  ?>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
</div>
