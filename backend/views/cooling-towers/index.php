<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CoolingTowerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cooling Towers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cooling-tower-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cooling Tower', ['create'], ['class' => 'btn btn-success']) ?>
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

            // 'cooling_tower_id',
            // 'freq_id',
            // 'monthly_cleaning',
            // 'quarterly_cleaning',
            // 'daily_sensible_check',
            // 'quarterly_sensible_check',
            // 'quarterly_lubrication_check',
            // 'monthly_electrical_check',
            // 'quarterly_electrical_check',
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
