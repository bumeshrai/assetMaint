<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TunnelVentilationDamperSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tunnel Ventilation Dampers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tunnel-ventilation-damper-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tunnel Ventilation Damper', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tvd_id',
            'freq_id',
            'actuator_cam_check',
            'actuator_cam_setting',
            'blades_cleaned',
            // 'linkages_check',
            // 'linkage_moving_smooth',
            // 'manual_close_open_check',
            // 'actuator_spring_tightness',
            // 'frame_nuts_tightness_check',
            // 'frame_corroded',
            // 'actuator_wiring_ok',
            // 'blades_open_alignment_ok',
            // 'blades_close_alignment_ok',
            // 'close_open_sound',
            // 'limit_switch_signal_check',
            // 'physical_inspection',
            // 'description',
            // 'asset_code',
            // 'maint_type_id',
            // 'eng_id',
            // 'contractor',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
