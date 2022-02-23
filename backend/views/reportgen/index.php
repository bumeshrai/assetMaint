<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Equipment;
use common\models\StationCode;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BdreportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Breakdown Report';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    echo GridView::widget([

       //'export' => false,
    'dataProvider'=>$dataProvider,
    //'filterModel'=>$searchModel,
  //  'showPageSummary'=>true,
    'pjax'=>true,
    'striped'=>true,
    'hover'=>true,
    'panel'=>['type'=>'primary', 'heading'=>'Breakdown Report'],
      'columns'=>[
        ['class'=>'kartik\grid\SerialColumn'],

        [
          'attribute' => 'equipment',
          'label'=>'Asset Code',
          'value' => 'equipment.asset_code',
          'group'=> true
        ],
        [
          'attribute' => 'stationName',
          'value' => 'stationName.station_name',
        ],

        [
           'attribute' => 'equipmentName',
           'value' => 'equipmentName.ename_name',
        ],

        [
            'attribute' => 'levelName',
            'label'=>'Location',
            'value' => 'levelName.level_name',
        ],
        [
             'attribute' => 'bd_description',
             'label'=>'Brief Breakdown Description'

        ],
        [
             'attribute' => 'reported_by',
             'label' => 'Reported By'
        ],

             'reporting_time:datetime',
        [
             'attribute' => 'repair_description',
             'label' => 'Repair Description'
        ],
        [
             'attribute' => 'attended_by',
             'label' => 'Attended By'
        ],

             'repaired_time:datetime',
             [
                 'attribute'=>'repairTime',
                 'label'=>'Time Taken',
              ]
        ],
]);
 ?>
</div>
