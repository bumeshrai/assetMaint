<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Ahu */

$this->title = $model->ahu_id;
$this->params['breadcrumbs'][] = ['label' => 'AHUs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ahu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ahu_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ahu_id], [
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
            'ahu_id',
            'freq_id',
            'weekly_cleaning:boolean',
            'quarterly_cleaning:boolean',
            'annually_cleaning:boolean',
            'daily_record_the_readings:boolean',
            'halfyearly_record_the_readings:boolean',
            'halfyearly_sensible_check:boolean',
            'annually_sensible_check:boolean',
            'monthly_tightness_check:boolean',
            'annually_tightness_check:boolean',
            'quarterly_lubircation:boolean',
            'quarterly_electrical_check:boolean',
            'quarterly_mechanical_check:boolean',
            'halfyearly_mechanical_check:boolean',
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
