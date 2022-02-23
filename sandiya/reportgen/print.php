<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $searchModel common\models\BdreportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<p>To</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Deputy Manager</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CMRL </pre></p>
<h4>Breakdown Details </h4>
<div>
<?php
echo GridView::widget([
   'export' => false,
'dataProvider'=>$dataProvider,
//'filterModel'=>$searchModel,
//  'showPageSummary'=>true,
'pjax'=>true,
'striped'=>true,
'hover'=>true,
//'panel'=>['type'=>'primary', 'heading'=>'Breakdown Report'],
  'columns'=>[
    ['class'=>'kartik\grid\SerialColumn'],
  /*  displays asset_code from breakdown table
  [
        'attribute'=>'asset_code',
        //'width'=>'310px',
        'format'=>'raw',
        'value'=>function ($model, $key, $index, $widget) {
            return $model->asset_code;
        },

        'filterInputOptions'=>['placeholder'=>'Asset Code'],
        'group'=>true,  // enable grouping
    ],*/
    [
        'attribute' => 'equipment',
        'label'=>'Asset Code',
        'value' => 'equipment.asset_code',
        'group'=> true
    ],
    [
        'attribute' => 'stationName',
        'value' => 'stationName.station_code',
        'group'=>true
    ],
    [
        'attribute' => 'equipmentName',
        'value' => 'equipmentName.ename_name',
        'group' => true
    ],
    [
        'attribute' => 'levelName',
        'label'=>'Location',
        'value' => 'levelName.level_name',
        'group'=>true
    ],
    [
        'attribute' => 'bd_description',
        'label'=>'Brief Breakdown Description'
    ],
    [
        'attribute' => 'reported_by',
        'label' => 'Reported By',
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

        'repaired_time:datetime'


],
]);?>
</div>
