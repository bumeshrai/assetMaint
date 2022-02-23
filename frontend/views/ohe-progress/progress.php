<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use scotthuangzl\googlechart\GoogleChart;


/* @var $this yii\web\View */
/* @var $model common\models\OheProgress */

$this->title = 'Progress of works ';
$this->params['breadcrumbs'][] = ['label' => 'OHE Progress', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ohe-progress-form">
	
	<?php //print_r($model);?> <br>
	<?php //print_r($dataBracketAssy);?> <br>

    <?php $form = ActiveForm::begin(); ?>

	<h3>Section: <?php echo $model->section;?> 
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Target Date <?php echo $model->date_to_finish;?> </h3>
	Direction: <?php echo $model->direction;?>
	&nbsp Tension: <?php echo $model->tension_number;?>	
	&nbsp Length: <?php echo $model->tension_length;?>	

    <?php if($model->expansion_joint_total == 0 ||
            $model->marking_total == 0 ||
            $model->bolt_total == 0 ||
            $model->bracket_total == 0 ||
            $model->rail_total == 0 ||
            $model->contact_wire_total == 0 ||
            $model->aec_erection_total == 0 ||
            $model->aec_clamping_total == 0 ||
            $model->bec_laying_total == 0 ) 
        { ?>
                <h3><br/><br/><br/><br/>Totals not entered. Graphs cannot be displayed</h3>
    <?php } else {
	       echo GoogleChart::widget(array('visualization' => 'BarChart',
                'data' => array(
                    array('Task', 'Completion'),
                    array('Expansion Joint', $model->expansion_joint_completed/$model->expansion_joint_total),
                    array($model->expansion_joint_completed . '/' . $model->expansion_joint_total, 0),
                    array('Marking', $model->marking_completed/$model->marking_total),
                    array($model->marking_completed . '/' . $model->marking_total, 0),
                    array('Bolts', $model->bolt_completed/$model->bolt_total),
                    array($model->bolt_completed . '/' . $model->bolt_total, 0),
                    array('Brackets', $model->bracket_completed/$model->bracket_total),
                    array($model->bracket_completed . '/' . $model->bracket_total, 0),
                    array('Rail', $model->rail_completed/$model->rail_total),
                    array($model->rail_completed . '/' . $model->rail_total, 0),
                    array('Contact Wire', $model->contact_wire_completed/$model->contact_wire_total),
                    array($model->contact_wire_completed . '/' . $model->contact_wire_total, 0),
                    array('AEC Erection', $model->aec_erection_completed/$model->aec_erection_total),
                    array($model->aec_erection_completed . '/' . $model->aec_erection_total, 0),
                    array('AEC Clamping', $model->aec_clamping_completed/$model->aec_clamping_total),
                    array($model->aec_clamping_completed . '/' . $model->aec_clamping_total, 0),
                    array('BEC Laying', $model->bec_laying_completed/$model->bec_laying_total),
                    array($model->bec_laying_completed . '/' . $model->bec_laying_total, 0),
                ),
                'options' => array('title' => 'Progress',
                					'fontSize' => 10,
                					'width' => 1000,
                    				'height' => 500,)));
	} ?>
</div>


<?php ActiveForm::end(); ?>


