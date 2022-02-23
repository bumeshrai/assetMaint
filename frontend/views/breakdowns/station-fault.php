<html>
<head>
<style>
table, td, th {
    border: 1px solid #ddd;
    text-align: left;
}

th, td {
    padding: 2px;
}
</style>
</head>

<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Equipment */

$this->title = 'Stationwise';
$this->params['breadcrumbs'][] = ['label' => 'Breakdown Report', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?> 
<div class="row">
    <div class="col-lg-6">
        <h1>Select Station</h1>
        <?= $form->field($model, 'corr_id')->dropDownList($this->params['itemCorridors'],[ 'prompt' => '--- choose from ---' ]) ?>
        <?= $form->field($model, 'stn_id')->dropDownList($this->params['itemStationCodes'],[ 'prompt' => '--- choose from ---' ]) ?>
        <?php if ($period == 0) { ?>
            <?= $form->field($model,'period')->checkbox(array('label'=>'Choose the Period')) ?>
        <?php }  else {?>
            <?= $form->field($model, 'start_date')->input('date') ?>  
            <?= $form->field($model, 'end_date')->input('date') ?>  
        <?php }  ?>
   </div>
</div>
<div class="form-group">
    <?= Html::submitButton('Select' , ['class' => 'btn btn-success']) ?>
</div>


<!-- <?= 'Start Date ' . $startDate ?>
<?= 'End Date ' . $endDate ?>
 -->


<?php if ($stationSelected != '') { ?>

<h2> <?= 'Monthly failure at ', $stationSelected , ' Station'; ?></h4>
<h4> Escalator</h2>

<!--  Table attributes in CSS above. HTML 5 standards-->

<table style="width:30%",>
<tr>
    <th>Month</th>
    <th>Breakdown Nos.</th>
</tr>

<?php while ($record = current($efailure)) { ?>
    <tr>
    <td> <?= $record['MONTH'];?></td>
    <td> <?= $record['FAIL'];?></td>
    </tr>
<?php next($efailure); } ?>
<!-- End of first table  -->
</table> 
<br><br><br>

<h4> Lift</h2>
<table style="width:30%",>
<tr>
    <th>Month</th>
    <th>Breakdown Nos.</th>
</tr>

<?php while ($record = current($lfailure)) { ?>
    <tr>
    <td> <?= $record['MONTH'];?></td>
    <td> <?= $record['FAIL'];?></td>
    </tr>
<?php next($lfailure); } ?>
<!-- End of first table  -->
</table> 

<?php }  ?>

<?php ActiveForm::end(); 
