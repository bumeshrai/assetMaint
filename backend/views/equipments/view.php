<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Equipment */

$this->title = $model->equip_id;
$this->params['breadcrumbs'][] = ['label' => 'Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->equip_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->equip_id], [
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
            'equip_id',
            'corridor_nos.corr_name',
            'equipment_name.ename_name',
            'manuf_id',
            'enos_id',
            'located_at.level_name',
            'station_name.station_name',
            'installation_date',
            'asset_code',
            'last_major_overhaul',
            'last_minor_maintenance',
        ],
    ]) ?>

</div>
