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

$this->title = 'Daily Electricity Consumption';
$this->params['breadcrumbs'][] = ['label' => 'Meter Reading', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="daily-consumption-form">
	
	<?php //print_r($total);?>

<?php $form = ActiveForm::begin(); ?>

<!-- displaying the dropdown list -->
<select name="month">
    <option value="">Select Month</option>
    <?php
    foreach ($formattedMonthArray as $key => $month) {
        echo '<option value="'.$key.'">'.$formattedMonthArray[$key].'</option>';
    }
    ?>
</select>
<select name="year">
    <option value="">Select Year</option>
    <?php
    foreach ($yearArray as $year) {
        echo '<option value="'.$year.'">'.$year.'</option>';
    }
    ?>
</select>
<br><br><br><br>
        <?= Html::submitButton('Select', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

<?php
if ($monthSelected != '') {
    echo GoogleChart::widget(array('visualization' => 'LineChart',
        'data' => $total,
        'options' => array('title' => ' Daily Energy Readings for ' .$formattedMonthArray[$monthSelected]. ' of ' .$yearSelected. '',
                            'height' => 400)));
?>

<?php
/*	
echo '<h2> Daily Electricity Consumption for '.$formattedMonthArray[$monthSelected]. ' of ' .$yearSelected. '</h2>'
*/
?>
<table style="width:80%",>
<tr>
<th>Alandur</th>
<th>Koyembeddu</th>
<th>Solar</th>
</tr>
<tr>
<td>
<table style="width:90%",>

<tr>
    <th>Day</th>
    <th>KWH</th>
    <th>KVAH</th>
</tr>

<?php while ($record = current($arss)) { ?>
	<tr>
	<td> <?= $record[0];?></td>
	<td> <?= $record[1];?></td>
	<td> <?= $record[2];?></td>
	</tr>
<?php next($arss); } ?>
<tr>
<td> Total </td>
<td> <?= $aValues['KWH'];?></td>
<td> <?= $aValues['KVAH'];;?></td>
</tr>
<tr>
<td> </td>
</tr>
<tr>
<td> </td>
</tr>
<tr>
<td> </td>
</tr>
<tr>
<td> Power Factor </td>
<td> <?= number_format($aValues['PF'], 4, '.', '');?></td>
</tr>
<tr>
<td> Maximum Demand </td>
<td> <?= $aValues['MD'];?></td>
</tr>
<tr>
<td> Approx. TNEB Bill </td>
<td> <?= $aValues['BILL'];?></td>
</tr>
<tr>
<td> Approx. PF Penalty </td>
<td> <?= number_format($aValues['PENALTY'], 0, '.', '');?></td>
</tr>
</table>
</td>
<!--  End of first table -->

<td>
<table style="width:90%",>
<tr>
    <th>Day</th>
    <th>KWH</th>
    <th>KVAH</th>
</tr>

<?php while ($record = current($krss)) { ?>
    <tr>
    <td> <?= $record[0];?></td>
    <td> <?= $record[1];?></td>
    <td> <?= $record[2];?></td>
    </tr>
<?php next($krss); } ?>
<tr>
<td> Total </td>
<td> <?= $kValues['KWH'];?></td>
<td> <?= $kValues['KVAH'];;?></td>
</tr>
<tr>
<td> </td>
</tr>
<tr>
<td> </td>
</tr>
<tr>
<td> </td>
</tr>
<tr>
<td> Power Factor </td>
<td> <?= number_format($kValues['PF'], 4, '.', '');?></td>
</tr>
<tr>
<td> Maximum Demand </td>
<td> <?= $kValues['MD'];?></td>
</tr>
<tr>
<td> Approx. TNEB Bill </td>
<td> <?= $kValues['BILL'];?></td>
</tr>
<tr>
<td> Approx. PF Penalty </td>
<td> <?= number_format($kValues['PENALTY'], 0, '.', '');?></td>
</tr>
</table>
</td>
<!--  End of second table -->

<td>
<table style="width:90%",>
<tr>
    <th>Day</th>
    <th>Generation</th>
</tr>

<?php while ($record = current($solar)) { ?>
    <tr>
    <td> <?= $record[0];?></td>
    <td> <?= $record[1];?></td>
    </tr>
<?php next($solar); } ?>
<tr>
<td> Total </td>
<?php while ($record = current($sSumGens)) { ?>
    <td> <?= $record['KWH'];?></td>
</tr>
<tr>
<td> </td>
</tr>
<tr>
<td> </td>
</tr>
<tr>
<td> </td>
</tr>
<tr>
<td> Approx. Solar Charges </td>
<td> <?= $record['KWH'] * 5.45;?></td>
</tr>
<?php next($sSumGens); } ?>
</table>
</td>
<!--  End of third table -->

</tr>
</table>
<?php } ?>


