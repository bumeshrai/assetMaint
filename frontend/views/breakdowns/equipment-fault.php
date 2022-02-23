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

$this->title = 'Equipmentwise';
$this->params['breadcrumbs'][] = ['label' => 'Breakdown Report', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?> 
<div class="row">
    <div class="my-col-lg-6">
        <h1>Select Equipment</h1>
        <?= $form->field($model, 'corr_id')->dropDownList($this->params['itemCorridors'],[ 'prompt' => '--- choose from ---' ]) ?>
        <?= $form->field($model, 'stn_id')->dropDownList($this->params['itemStationCodes'],[ 'prompt' => '--- choose from ---' ]) ?>
        <?= $form->field($model, 'ename_id')->dropDownList($this->params['itemEquipmentNames'],[ 'prompt' => '--- choose from ---']) ?>
        <?= $form->field($model, 'enos_id')  ?>
    	<?= $form->field($model, 'level_id')->dropDownList($this->params['itemLevels'],[ 'prompt' => '--- choose location ---' ,]) ?>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton('Select' , ['class' => 'btn btn-success']) ?>
</div>

<?php if ($stationSelected != '') { ?>

<h3> <?= 'Failure record of ' . $equipmentSelected . ' Nos. ' . $enos_id , ' at ', $stationSelected , ' Station located at ' . $levelSelected ; ?></h4>

<!--  Table attributes in CSS above. HTML 5 standards-->


<table style="width:90%",>
<tr>
    <th>Breakdown date</th>
    <th>Failure Description</th>
    <th>Repair Description</th>
</tr>

<?php while ($record = current($failure)) { ?>
	<tr>
	<td> <?= $record['DATE'];?></td>
	<td> <?= $record['bd_description'];?></td>
    <td> <?= $record['repair_description'];?></td>
	</tr>
<?php next($failure); } ?>
<!-- End of first table  -->
</table> 
<br><br><br>

<?php }  ?>

<?php ActiveForm::end(); 
