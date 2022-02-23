<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CoolingTower */

$this->title = $model->cooling_tower_id;
$this->params['breadcrumbs'][] = ['label' => 'Cooling Towers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cooling-tower-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cooling_tower_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cooling_tower_id], [
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
            'cooling_tower_id',
            'freq_id',
            'monthly_cleaning:boolean',
            'quarterly_cleaning:boolean',
            'daily_sensible_check:boolean',
            'quarterly_sensible_check:boolean',
            'quarterly_lubrication_check:boolean',
            'monthly_electrical_check:boolean',
            'quarterly_electrical_check:boolean',
            'quarterly_mechanical_check:boolean',
            'description:ntext',
            'asset_code',
            'maint_type_id',
            'eng_id',
            'contractor',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
