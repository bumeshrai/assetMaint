<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vrf */

$this->title = $model->vrf_id;
$this->params['breadcrumbs'][] = ['label' => 'VRFs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vrf-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vrf_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vrf_id], [
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
            'vrf_id',
            'freq_id',
            'weekly_cleaning:boolean',
            'monthly_cleaning:boolean',
            'quarterly_cleaning:boolean',
            'annually_cleaning:boolean',
            'monthly_functional_check:boolean',
            'quarterly_functional_check:boolean',
            'monthly_record_the_readings:boolean',
            'quarterly_sensible_check:boolean',
            'weekly_lubrication_check:boolean',
            'weekly_electrical_check:boolean',
            'quarterly_electrical_check:boolean',
            'annually_electrical_check:boolean',
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
