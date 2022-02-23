<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\EquipmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['userreq'],
        'method' => 'get',
    ]); ?>


        <?php $assetcode = ArrayHelper::map(\common\models\Equipment::find()->orderBy('asset_code')->all(), 'asset_code', 'asset_code') ?>
        <?= $form->field($model, 'asset_code')->dropDownList($assetcode,
        ['prompt' => '---- Select Asset Code----'])->label('Asset Code') ?>


        <?php $station = ArrayHelper::map(\common\models\StationCode::find()->orderBy('station_name')->all(), 'station_code', 'station_name') ?>
        <?= $form->field($model, 'station_name')->dropDownList($station,
        ['prompt' => '---- Select Station Name----'])->label('Station Name') ?>

        <?php //$equipment = ArrayHelper::map(\common\models\EquipmentName::find()->orderBy('ename_id')->all(), 'ename_id', 'ename_name') ?>
        <?php // echo  $form->field($model, 'equipment_name')->dropDownList($equipment,
      //  ['prompt' => '---- Select Equipment Name----'])->label('Equipment Name') ?>

        <?= $form->field($model, 'equipment_name') ?>
        <?php //  $form->field($model, 'levelName') ?>

        <?php // $department = ArrayHelper::map(\common\models\Department::find()->orderBy('dept_name')->all(), 'dept_id', 'dept_name') ?>
        <?php //$form->field($model, 'deptName')->dropDownList($department,
      //  ['prompt' => '---- Select Department Name----'])->label('Department Name') ?>

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
        <?php echo Html::submitButton('Search',array('name' => 'button3','class' => 'btn btn-success')); ?>

        <?php echo Html::submitButton('Generate Report',array('name' => 'button4','class' => 'btn btn-primary')); ?>
</div>

<?php ActiveForm::end(); ?>

</div>
