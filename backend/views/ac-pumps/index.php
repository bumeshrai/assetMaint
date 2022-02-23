<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AcPumpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'VAC Pumps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ac-pump-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create VAC Pump', ['create'], ['class' => 'btn btn-success']) ?>
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

            // 'ac_pump_id',
            // 'freq_id',
            // 'monthly_cleaning',
            // 'quarterly_cleaning',
            // 'quarterly_leak_testing',
            // 'quarterly_record_the_reading',
            // 'monthly_sensible_check',
            // 'quarterly_sensible_check',
            // 'quarterly_lubrication_check',
            // 'monthly_electrical_check',
            // 'halfyearly_electrical_check',
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
