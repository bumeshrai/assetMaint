<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TunnelVentilationFanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tunnel Ventilation Fans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tunnel-ventilation-fan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tunnel Ventilation Fan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tvf_id',
            'freq_id',
            'check_impeller_blade',
            'check_impeller_wing_root',
            'impeller_blade_condition',
            // 'clean_motor_casing',
            // 'lubricate_motor',
            // 'electrical_insulation',
            // 'electrical_terminal',
            // 'check_manual_operation',
            // 'check_emergency_stop',
            // 'check_flexible_connector',
            // 'vibration_isolater_level',
            // 'physical_inspection',
            // 'noise_level_in_db',
            // 'fan_vibration_reading',
            // 'blade_tip_clearance_reading',
            // 'description',
            // 'asset_code',
            // 'maint_type_id',
            // 'eng_id',
            // 'contractor',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
