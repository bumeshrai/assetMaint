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
use yii\widgets\ActiveForm;
use scotthuangzl\googlechart\GoogleChart;



/* @var $this yii\web\View */
/* @var $model common\models\OheProgress */

$this->title = 'Monthly Electricity Consumption';
$this->params['breadcrumbs'][] = ['label' => 'Meter Reading', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h2> Monthly Electricity Consumption</h2>
<h4>Alandur RSS</h4>

<!--  Table attributes in CSS above. HTML 5 standards-->
<table style="width:50%",>
<tr>
    <th>Month</th>
    <th>KWH</th>
    <th>KVAH</th>
    <th>PF</th>
</tr>

<?php while ($record = current($aconsumption)) { ?>
	<tr>
	<td> <?= $record['MONTH'];?></td>
	<td> <?= $record['KWH'];?></td>
	<td> <?= $record['KVAH'];?></td>
	<td> 
	<?php if ($record['KVAH'] != '0') { ?>
			<td> <?= number_format($record['KWH']/$record['KVAH'], 4, '.', '');?></td>
			<td> </td>
	<?php } else {?>
		<td> 1 </td>
	<?php } ?>
	</td>
	</tr>
<?php next($aconsumption); } ?>
<!--  End of first table -->
</table>

<br>
<h4>Koyembeddu RSS</h4>
<!--  Start of second table -->
<table style="width:50%",>
<tr>
    <th>Month</th>
    <th>KWH</th>
    <th>KVAH</th>
    <th>PF</th>
</tr>
<?php while ($record = current($kconsumption)) { ?>
	<tr>
	<td> <?= $record['MONTH'];?></td>
	<td> <?= $record['KWH'];?></td>
	<td> <?= $record['KVAH'];?></td>
	<td> <?= number_format($record['KWH']/$record['KVAH'], 4, '.', '');?></td>
	</td>
<?php next($kconsumption); } ?>
<!--  End of second table -->
</table>

<br>
<h4>Solar Generation</h4>
<!--  Start of second table -->
<table style="width:50%",>
<tr>
    <th>Month</th>
    <th>KWH</th>
</tr>
<?php while ($record = current($sgeneration)) { ?>
	<tr>
	<td> <?= $record['MONTH'];?></td>
	<td> <?= $record['KWH'];?></td>
	</td>
<?php next($sgeneration); } ?>
<!--  End of second table -->
</table>

<br>
<h4>Total Consumption</h4>
<!--  Start of second table -->
<table style="width:50%",>
<tr>
    <th>Month</th>
    <th>KWH</th>
    <th>KVAH</th>
    <th>PF</th>
</tr>
<?php while ($record = current($tconsumption)) { ?>
	<tr>
	<td> <?= $record['MONTH'];?></td>
	<td> <?= $record['KWH'];?></td>
	<td> <?= $record['KVAH'];?></td>
	<td> <?= number_format($record['KWH']/$record['KVAH'], 4, '.', '');?></td>
	</td>
<?php next($tconsumption); } ?>
<!--  End of second table -->
</table>
