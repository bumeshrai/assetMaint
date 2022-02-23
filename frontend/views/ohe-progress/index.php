<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OheProgresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'OHE Erection Progress';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ohe-progress-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enter OHE Progress', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ohe_id',
            'section',
            'direction',
            'tension_number',
            'tension_length',
            // 'bracket_assy_total',
            // 'bracket_assy_completed',
             'marking_total',
            // 'marking_completed',
            // 'bolt_total',
            // 'bolt_completed',
            // 'bracket_total',
             'bracket_completed',
            // 'rail_total',
             'rail_completed',
            // 'contact_wire_total',
             'contact_wire_completed',
            // 'aec_erection_total',
            // 'aec_erection_completed',
            // 'aec_clamping_total',
            // 'aec_clamping_completed',
            // 'bec_laying_total',
            // 'bec_laying_completed',
            // 'met_fixing_total',
            // 'met_fixing_completed',
            // 'bracket_adjustment',
            // 'stagger_adjustment',
            'work_completed:boolean',
            'under_progress:boolean',
            [
                'attribute'=>'date_to_finish',
                'label'=>'Target date',
                'format' =>  ['date', 'php:d-M-Y'],
            ],
            //'date_to_finish',
            [
                'attribute'=>'date_finished',
                'label'=>'Completion Date',
                'format' =>  ['date', 'php:d-M-Y'],
            ],
            //'date_finished',
            'work_completed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
