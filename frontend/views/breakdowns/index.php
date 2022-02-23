<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BreakdownSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Breakdowns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="breakdown-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Breakdown', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bd_id',
            'asset_code',
            'reported_by',
            'attended',
            'reporting_time:datetime',
            // 'attended_by',
            // 'repaired_time:datetime',
            // 'bd_description:ntext',
            // 'repair_description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
