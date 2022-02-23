<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Escalator */

$this->title = $model->escl_id;
$this->params['breadcrumbs'][] = ['label' => 'Escalators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escalator-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->escl_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->escl_id], [
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
            'escl_id',
            'freq_id',
            'clean_component_list:boolean',
            'lubricate_chains:boolean',
            'grease_shaft_bushes:boolean',
            'quaterly_visual_check:boolean',
            'halfyearly_visual_check:boolean',
            'annual_visual_check:boolean',
            'monthly_step_inspection:boolean',
            'quaterly_step_inspection:boolean',
            'halfyearly_step_inspection:boolean',
            'annual_step_inspection:boolean',
            'monthly_step_chain_inspection:boolean',
            'halfyearly_step_chain_inspection:boolean',
            'annual_step_chain_inspection:boolean',
            'monthly_comb_inspection:boolean',
            'annual_comb_inspection:boolean',
            'handrail_inspection:boolean',
            'drive_chain_inspection:boolean',
            'monthly_machinery_inspection:boolean',
            'halfyearly_machinery_inspection:boolean',
            'annual_machinery_inspection:boolean',
            'monthly_brake_inspection:boolean',
            'halfyearly_brake_inspection:boolean',
            'monthly_safety_function:boolean',
            'halfyearly_safety_function:boolean',
            'monthly_operative_function:boolean',
            'halfyearly_operative_function:boolean',
            'annual_operative_function:boolean',
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
