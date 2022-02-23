<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\ListView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BdreportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Breakdown Count';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('bdsearch', ['model' => $searchModel]); ?>
    <?php
    echo GridView::widget([
    'dataProvider'=>$dataProvider,
    //'filterModel'=>$searchModel,
    'showPageSummary'=>true,
    'pjax'=>true,
    'striped'=>true,
    'hover'=>true,
    'panel'=>['type'=>'primary', 'heading'=>'Breakdown Report'],
    'options' => [
                'style'=>'overflow: scroll; word-wrap: break-word;'
        ],
    'columns'=>[
        ['class'=>'kartik\grid\SerialColumn'],

        'asset_code',
        [
            'attribute' => 'station_name',
            'value' => 'station_name.station_name'
        ],

        [
            'attribute' => 'equipment_name',
            'value' => 'equipment_name.ename_name'
        ],

          [
              'attribute' => 'located_at',
              'value' => 'located_at.level_name'
          ],
          [
               'attribute' => 'deptName',
               'value' => 'deptName.dept_name',
               'label'=>'Department Name'
           ],

       'totalFailure',
       'attended',
       'pending'


    ],
]); ?>

</div>
