<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PowerReadingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Power Readings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="power-reading-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enter Daily Meter Reading', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'reading_id',
            [
                'attribute'=>'date_on',
                'label'=>'Reading Date',
                'format' =>  ['date', 'php:d-M-Y'],
            ],
            'receiving_station',
            'supply',
            'active_power',
            'total_power',
            'solar_generation',
            'maximum_demand',
            'power_factor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
