<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LiftSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lifts Maintenance Schedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lift-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lift', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'lift_id',
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
                'label'=>'Done id',
                'headerOptions' => ['width' => '30'],
                'value' => 'frequency.frequency'
            ],
            'description:ntext',
            //'monthly_cleaning_list',
            //'quaterly_cleaning_list',
            //'halfyearly_cleaning_list',
            // 'lubricate',
            // 'monthly_visual_check',
            // 'halfyearly_visual_check',
            // 'annual_visual_check',
            // 'monthly_hoistway_inspection',
            // 'quaterly_hoistway_inspection',
            // 'halfyearly_hoistway_inspection',
            // 'monthly_door_inspection',
            // 'quaterly_door_inspection',
            // 'monthly_car_cabin_inspection',
            // 'annual_car_cabin_inspection',
            // 'monthly_safety_function',
            // 'halfyearly_safety_function',
            // 'annual_safety_function',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
