<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use scotthuangzl\googlechart\GoogleChart;



/* @var $this yii\web\View */
/* @var $model common\models\StationEarning */

$this->title = 'Monthly Earnings';
$this->params['breadcrumbs'][] = ['label' => 'Monthly Station Earnings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="daily-earning-form">
<!-- 
<?= print_r($searning); ?>
 -->	


<?php
if(!empty($earning))
    echo GoogleChart::widget(array('visualization' => 'ColumnChart',
        'data' => $earning,
        'options' => array('title' => 'Total Monthly Earnings',
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