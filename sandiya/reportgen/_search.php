<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model common\models\BdreportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="breakdown-search">

    <?php $form = ActiveForm::begin([
       'action' => ['userreq'],
        'method' => 'get',
    ]); ?>


    <?php $assetcode = ArrayHelper::map(\common\models\Equipment::find()->orderBy('asset_code')->all(), 'asset_code', 'asset_code') ?>
    <?= $form->field($model, 'equipment')->dropDownList($assetcode,
    ['prompt' => '---- Select Asset Code----'])->label('Asset Code') ?>


    <?php $station = ArrayHelper::map(\common\models\StationCode::find()->orderBy('station_name')->all(), 'station_code', 'station_name') ?>
    <?= $form->field($model, 'stationName')->dropDownList($station,
    ['prompt' => '---- Select Station Name----'])->label('Station Name') ?>

    <?php //$equipment = ArrayHelper::map(\common\models\EquipmentName::find()->orderBy('ename_id')->all(), 'ename_name', 'ename_name') ?>
    <?php // $form->field($model, 'equipmentName')->dropDownList($equipment,
    //['prompt' => '---- Select Equipment Name----'])->label('Equipment Name') ?>

    <?php echo $form->field($model, 'equipmentName') ?>
    <?php //echo $form->field($model, 'levelName') ?>
    <?php echo $form->field($model, 'deptName')->label('Department') ?>


    <?php echo '<label class="control-label">Select date </label>';
     echo DatePicker::widget([
    'model' => $model,
    'attribute' => 'fromdate',
    'attribute2' => 'todate',
    'options' => ['placeholder' => 'Start date'],
    'options2' => ['placeholder' => 'End date'],
    'type' => DatePicker::TYPE_RANGE,
    'form' => $form,
    'pluginOptions' => [
    'format' => 'dd-mm-yyyy',
    'autoclose' => true,
    ]
    ]);
?>
<div class="form-group">

<?php echo Html::submitButton('Search', array('name' => 'button1','class' => 'btn btn-success')); ?>

<?php echo Html::submitButton('Generate Report', array('name' => 'button2','class' => 'btn btn-primary')); ?>

</div>

<?php ActiveForm::end(); ?>

</div>
