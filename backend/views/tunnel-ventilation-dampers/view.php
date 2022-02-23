<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TunnelVentilationDamper */

$this->title = $model->tvd_id;
$this->params['breadcrumbs'][] = ['label' => 'Tunnel Ventilation Dampers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tunnel-ventilation-damper-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->tvd_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->tvd_id], [
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
            'tvd_id',
            'freq_id',
            'actuator_cam_check',
            'actuator_cam_setting',
            'blades_cleaned',
            'linkages_check',
            'linkage_moving_smooth',
            'manual_close_open_check',
            'actuator_spring_tightness',
            'frame_nuts_tightness_check',
            'frame_corroded',
            'actuator_wiring_ok',
            'blades_open_alignment_ok',
            'blades_close_alignment_ok',
            'close_open_sound',
            'limit_switch_signal_check',
            'physical_inspection',
            'description',
            'asset_code',
            'maint_type_id',
            'eng_id',
            'contractor',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
