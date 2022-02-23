<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EquipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Equipment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'equip_id',
            'asset_code',
            // 'corr_id',
            [
                'attribute' => 'equipment_name',
                'value' => 'equipment_name.ename_name'
            ],
            // 'manuf_id',
            // 'enos_id',
            [
                'attribute' => 'station_name',
                'value' => 'station_name.station_code'
            ],
            [
                'attribute' => 'located_at',
                'value' => 'located_at.level_name'
            ],
            // 'stn_id',
            'installation_date:date',
            // 'last_major_overhaul',
            // 'last_minor_maintenance',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
