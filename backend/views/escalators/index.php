<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EscalatorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Escalators Maintenance Schedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escalator-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Escalator', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'escl_id',
            /*[
                'attribute'=>'freq_id',
                'label'=>'Freq',
                'headerOptions' => ['width' => '30'],
            ],*/
            'asset_code',
            [
                'attribute' => 'eng',
                'label' => 'Engineer',
                'value' => 'eng.username'
            ],           
            'contractor',
            [
                'attribute'=>'created_at',
                'label'=>'Maint. Done on',
                'format' =>  ['date', 'php:d-M-Y'],
            ],
            [
                'attribute'=>'frequency',
                'label'=>'Maint. Done',
                'headerOptions' => ['width' => '30'],
                'value' => 'frequency.frequency'
            ],
            'description:ntext',

            // 'updated_at',
            //'clean_component_list',
            //'lubricate_chains',
            //'grease_shaft_bushes',
            // 'quaterly_visual_check',
            // 'halfyearly_visual_check',
            // 'annual_visual_check',
            // 'monthly_step_inspection',
            // 'quaterly_step_inspection',
            // 'halfyearly_step_inspection',
            // 'annual_step_inspection',
            // 'monthly_step_chain_inspection',
            // 'halfyearly_step_chain_inspection',
            // 'annual_step_chain_inspection',
            // 'monthly_comb_inspection',
            // 'annual_comb_inspection',
            // 'handrail_inspection',
            // 'drive_chain_inspection',
            // 'monthly_machinery_inspection',
            // 'halfyearly_machinery_inspection',
            // 'annual_machinery_inspection',
            // 'monthly_brake_inspection',
            // 'halfyearly_brake_inspection',
            // 'monthly_safety_function',
            // 'halfyearly_safety_function',
            // 'monthly_operative_function',
            // 'halfyearly_operative_function',
            // 'annual_operative_function',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
