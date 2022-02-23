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

            // 'bd_id',
            'asset_code',
            //'reported_by',
            'attended:boolean',
            'classify_BD:boolean',
            'resp_contractor:boolean',
            'reporting_time:datetime',
            //'attended_by',
            'repaired_time:datetime',
            //'bd_description:ntext',
            [
                'attribute'=>'repairTime',
                'label'=>'Time Taken',
             ],
            [
                'attribute'=>'bd_description',
                'label'=>'Breakdown Work',
                'contentOptions'=>['style'=>'max-width: 150px; overflow: auto;'],
            ],
            //'repair_description:ntext',
            [
                'attribute'=>'repair_description',
                'label'=>'Repair Work',
                'contentOptions'=>['style'=>'max-width: 150px; overflow: auto;'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
