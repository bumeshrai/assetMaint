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

    <p>
        <?php  //echo Html::a('Generate Report', ['print'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
  /*  echo GridView::widget([
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
        [
          //  'attribute'=>'asset_code',
            //'width'=>'310px',
        /*    'format'=>'raw',
            'value'=>function ($model, $key, $index, $widget) {
                return $model->asset_code;
            },

            'filterInputOptions'=>['placeholder'=>'Asset Code'],
            'group'=>true,  // enable grouping
        ],*/
    /*    [
          'attribute' => 'equipment',
          'label'=>'Asset Code',
          'value' => 'equipment.asset_code',
          //'group'=> true
      ],*/

              //   [//'attribute' => 'assetCode',
        /*          'label' => 'Asset Code',

              'value' => function($model){
                 $items = [];
                 foreach($model->assetCode as $assetCode){
                     $items[] = $model->assetCode;
                 }
                 return implode('',$items);
              }, 'format' => 'html'
          ],
      //    'assetCode',


        [
            'attribute' => 'stationName',
            'value' => 'stationName.station_code'

        ],

       [
            'attribute' => 'equipmentName',
            'value' => 'equipmentName.ename_name'
        ],

          [
              'attribute' => 'levelName',
              'label'=>'Location',
              'value' => 'levelName.level_name'
          ],

          [
              'attribute' => 'totalFailure',
              'label'=>'Total Failure'


          ],

    /*      ['attribute' => 'bd_id',
          'label' => 'Total Failure',

      'value' => function($model){
         $items = [];
         foreach($model->bd_id as $breakdown){
             $items[] = $model->bd_id;
         }
         return count($items);
      }, 'format' => 'raw'
  ],
['attribute' => 'deptName',
  'label' => 'Department',
  'value'=>'deptName.dept_name'
],
],
]);
/*echo $this->widget('booster.widgets.TbExtendedGridView', array(
  //  'filter'=>$person,
    'type'=>'striped bordered',
    'dataProvider' => $dataProvider,
    'template' => "{items}\n{extendedSummary}",
    //'columns' => $gridColumns,
    'extendedSummary' => array(
        'title' => 'Total Employee Hours',
        'columns' => array(
            'hours' => array('label'=>'Total Hours', 'class'=>'TbSumOperation')
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right',
        'style' => 'width:300px'
    ),
));*/
 echo GridView::widget([
    'dataProvider' => $dataProvider,
  //  'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],


        'asset_code',
        [
            'attribute' => 'station_name',
            'value' => 'station_name.station_code'
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
           ],

       'totalFailure'


    ],
]); ?>

</div>
