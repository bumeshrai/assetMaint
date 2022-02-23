<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VrfSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'VRFs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vrf-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create VRF', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            // 'vrf_id',
            // 'freq_id',
            // 'weekly_cleaning',
            // 'monthly_cleaning',
            // 'quarterly_cleaning',
            // 'annually_cleaning',
            // 'monthly_functional_check',
            // 'quarterly_functional_check',
            // 'monthly_record_the_readings',
            // 'quarterly_sensible_check',
            // 'weekly_lubrication_check',
            // 'weekly_electrical_check',
            // 'quarterly_electrical_check',
            // 'annually_electrical_check',
            // 'quarterly_mechanical_check',
            // 'description',
            // 'asset_code',
            // 'maint_type_id',
            // 'eng_id',
            // 'contractor',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
