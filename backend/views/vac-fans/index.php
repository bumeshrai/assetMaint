<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VacFanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'VAC Fans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vac-fan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create VAC Fan', ['create'], ['class' => 'btn btn-success']) ?>
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

            // 'fan_id',
            // 'freq_id',
            // 'quarterly_cleaning',
            // 'quarterly_electrical_check',
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
