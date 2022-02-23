<?php
use scotthuangzl\googlechart\GoogleChart;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/*print_r($aBill);
?>
<br>
<?php
print_r($sBill);*/


$this->title = 'Select Graph Variable ';
$this->params['breadcrumbs'][] = ['label' => 'Meter Reading', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="monthly-graph-form">


<?php $form = ActiveForm::begin(); ?>
    <input type="radio" name="graphSelected" value="wattage" checked> Monthly Reading<br>
    <input type="radio" name="graphSelected" value="powerFactor"> Power Factor<br>
    <input type="radio" name="graphSelected" value="monthlyBill"> Monthly Electricity Bill<br>
<br>

</div>


<div class="monthly-graph-form">
        <?= Html::submitButton('Select', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); 

if ($graphSelected == 'wattage') {
   echo GoogleChart::widget(array('visualization' => 'ColumnChart',
        'data' => $arss,
        'options' => array('title' => 'Monthly Consumption at Alandur RSS',
                            'height' => 400)));

    echo GoogleChart::widget(array('visualization' => 'ColumnChart',
        'data' => $krss,
        'options' => array('title' => 'Monthly Consumption at Koyembeddu RSS',
                            'height' => 400)));

    echo GoogleChart::widget(array('visualization' => 'ColumnChart',
        'data' => $sgen,
        'options' => array('title' => 'Monthly Solar Generation',
                            'height' => 400)));
}

if ($graphSelected == 'powerFactor') {
/*    
    echo GoogleChart::widget(array('visualization' => 'LineChart',
        'data' => $arsspf,
        'options' => array('title' => 'Monthly Power Factor at Alandur RSS',
                            'height' => 400)));

    echo GoogleChart::widget(array('visualization' => 'LineChart',
        'data' => $krsspf,
        'options' => array('title' => 'Monthly Power Factor at Koyembeddu RSS',
                            'height' => 400)));
*/    
    echo GoogleChart::widget(array('visualization' => 'LineChart',
        'data' => $powerFactor,
        'options' => array('title' => 'Monthly Power Factor ',
                            'height' => 400)));
}

if ($graphSelected == 'monthlyBill') {
    echo GoogleChart::widget(array('visualization' => 'LineChart',
        'data' => $totalBill,
        'options' => array('title' => 'Monthly Electricity Bill ',
                            'height' => 400)));
echo "**Note: Bill is approximate and calculated at Rs. 6.35 per unit, ignoring commercial loads";
}

?>
