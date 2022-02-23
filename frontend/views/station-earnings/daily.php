<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use scotthuangzl\googlechart\GoogleChart;



/* @var $this yii\web\View */
/* @var $model common\models\StationEarning */

$this->title = 'Daily Station Earnings';
$this->params['breadcrumbs'][] = ['label' => 'Station Earnings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="daily-earning-form">
	

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
<?php  /** echo $form->field($model, 'stn_id')->checkboxList($itemStations); */ ?>

<br><br><br>
        <?= Html::submitButton('Select', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

<!-- <?php print_r($searning); ?>
<br><br>
<?php print_r($earning); ?> -->

<?php
if(!empty($earning))
    echo GoogleChart::widget(array('visualization' => 'LineChart',
        'data' => $earning,
        'options' => array('title' => 'Daily Earnings',
                            'height' => 800)));
if(!empty($searning))
    echo GoogleChart::widget(array('visualization' => 'ColumnChart',
        'data' => $searning,
        'options' => array('title' => 'Stations Monthly Earnings',
                            'height' => 800)));
if(!empty($searning))
    echo GoogleChart::widget(array('visualization' => 'LineChart',
        'data' => $searning,
        'options' => array('title' => 'Stations Monthly Earnings',
                            'height' => 800)));

?>