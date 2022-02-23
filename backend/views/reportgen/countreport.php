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
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CMRL </p>

<h4>Breakdown Details </h4>
<div>
<?php
echo GridView::widget([
//   'export' => false,
'dataProvider'=>$dataProvider,
//'filterModel'=>$searchModel,
//  'showPageSummary'=>true,
'pjax'=>true,
'striped'=>true,
'hover'=>true,
//'panel'=>['type'=>'primary', 'heading'=>'Breakdown Report'],
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
]);
?>
</div>
