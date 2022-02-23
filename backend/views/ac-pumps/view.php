<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AcPump */

$this->title = $model->ac_pump_id;
$this->params['breadcrumbs'][] = ['label' => 'VAC Pumps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ac-pump-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ac_pump_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ac_pump_id], [
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
            'ac_pump_id',
            'freq_id',
            'monthly_cleaning:boolean',
            'quarterly_cleaning:boolean',
            'quarterly_leak_testing:boolean',
            'quarterly_record_the_reading:boolean',
            'monthly_sensible_check:boolean',
            'quarterly_sensible_check:boolean',
            'quarterly_lubrication_check:boolean',
            'monthly_electrical_check:boolean',
            'halfyearly_electrical_check:boolean',
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
