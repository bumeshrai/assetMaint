<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StationEarningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Station Earnings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-earning-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Station Earning', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'earning_id',
            'date_on',
            'stn_id',
            'cash',
            'card',
            // 'voucher',
            // 'web',
            'non_fare',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
