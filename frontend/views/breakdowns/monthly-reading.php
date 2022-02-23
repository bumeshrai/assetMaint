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

<?php //print_r($mergeResult); ?>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use scotthuangzl\googlechart\GoogleChart;

/* @var $this yii\web\View */
/* @var $model common\models\OheProgress */

$this->title = 'Monthly L&E Breakdowns';
$this->params['breadcrumbs'][] = ['label' => 'Breakdown Report', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h2> Monthly Breakdowns Number</h2>
<h4>Lift, Escalator and Total</h4>

<!--  Table attributes in CSS above. HTML 5 standards-->
<table style="width:80%",>
<tr>
    <th>Month</th>
    <th>Lift </th>
    <th>Repair Time(H:M:S)</th>
    <th>Escalator </th>
    <th>Repair Time(H:M:S)</th>
    <th>Total Failures </th>
    <th>Total Repair Time(H:M:S)</th>
</tr>

<?php foreach($mergeResult as $record) { ?>
	<tr>
	<td> <?= $record[0];?></td>
	<td> <?= $record[1];?></td>
	<td> <?= $record[2];?></td>
	<td> <?= $record[3];?></td>
	<td> <?= $record[4];?></td>
	<td> <?= $record[5];?></td>
	<td> <?= $record[6];?></td>
	</tr>
<?php } ?>
<!--  End of first table -->
</table>


