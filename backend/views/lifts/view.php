<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Lift */

$this->title = $model->lift_id;
$this->params['breadcrumbs'][] = ['label' => 'Lifts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lift-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->lift_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->lift_id], [
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
            'lift_id',
            'freq_id',
            'monthly_cleaning_list:boolean',
            'quaterly_cleaning_list:boolean',
            'halfyearly_cleaning_list:boolean',
            'lubricate:boolean',
            'monthly_visual_check:boolean',
            'halfyearly_visual_check:boolean',
            'annual_visual_check:boolean',
            'monthly_hoistway_inspection:boolean',
            'quaterly_hoistway_inspection:boolean',
            'halfyearly_hoistway_inspection:boolean',
            'monthly_door_inspection:boolean',
            'quaterly_door_inspection:boolean',
            'monthly_car_cabin_inspection:boolean',
            'annual_car_cabin_inspection:boolean',
            'monthly_safety_function:boolean',
            'halfyearly_safety_function:boolean',
            'annual_safety_function:boolean',
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
