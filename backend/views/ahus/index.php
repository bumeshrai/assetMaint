<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AhuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'AHUs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ahu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create AHU', ['create'], ['class' => 'btn btn-success']) ?>
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

            // 'ahu_Iid,
            // 'freq_id',
            // 'weekly_cleaning',
            // 'quarterly_cleaning',
            // 'annually_cleaning',
            // 'daily_record_the_readings',
            // 'halfyearly_record_the_readings',
            // 'halfyearly_sensible_check',
            // 'annually_sensible_check',
            // 'monthly_tightness_check',
            // 'annually_tightness_check',
            // 'quarterly_lubircation',
            // 'quarterly_electrical_check',
            // 'quarterly_mechanical_check',
            // 'halfyearly_mechanical_check',
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
