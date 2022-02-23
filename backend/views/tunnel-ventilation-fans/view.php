<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TunnelVentilationFan */

$this->title = $model->tvf_id;
$this->params['breadcrumbs'][] = ['label' => 'Tunnel Ventilation Fans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tunnel-ventilation-fan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->tvf_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->tvf_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tvf_id',
            'freq_id',
            'check_impeller_blade',
            'check_impeller_wing_root',
            'impeller_blade_condition',
            'clean_motor_casing',
            'lubricate_motor',
            'electrical_insulation',
            'electrical_terminal',
            'check_manual_operation',
            'check_emergency_stop',
            'check_flexible_connector',
            'vibration_isolater_level',
            'physical_inspection',
            'noise_level_in_db',
            'fan_vibration_reading',
            'blade_tip_clearance_reading',
            'description',
            'asset_code',
            'maint_type_id',
            'eng_id',
            'contractor',
            'created_at',
        ],
    ]) ?>

</div>
