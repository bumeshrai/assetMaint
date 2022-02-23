<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\OheProgress */

$this->title = 'Enter OHE Progress';
$this->params['breadcrumbs'][] = ['label' => 'OHE Progress', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class= 'col-md-4'>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'section')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'direction')->dropDownList($this->params['direction'],[ 'prompt' => '--- choose from ---' ]) ?>
    <?= $form->field($model, 'tension_number')->textInput() ?>
    <?= $form->field($model, 'tension_length')->textInput() ?>
    <?= $form->field($model, 'date_to_finish')->input('date') ?>
    <?= $form->field($model, 'date_finished')->input('date') ?>
    <?= $form->field($model, 'work_completed')->textInput() ?>
</div>
<div class= 'col-md-4'>
    <?= $form->field($model, 'expansion_joint_total')->textInput() ?>
    <?= $form->field($model, 'marking_total')->textInput() ?>
    <?= $form->field($model, 'bolt_total')->textInput() ?>
    <?= $form->field($model, 'bracket_total')->textInput() ?>
    <?= $form->field($model, 'rail_total')->textInput() ?>
    <?= $form->field($model, 'contact_wire_total')->textInput() ?>
    <?= $form->field($model, 'aec_erection_total')->textInput() ?>
    <?= $form->field($model, 'aec_clamping_total')->textInput() ?>
    <?= $form->field($model, 'bec_laying_total')->textInput() ?>
</div>
<div class= 'col-md-4'>
    <?= $form->field($model, 'expansion_joint_completed')->textInput() ?>
    <?= $form->field($model, 'marking_completed')->textInput() ?>
    <?= $form->field($model, 'bolt_completed')->textInput() ?>
    <?= $form->field($model, 'bracket_completed')->textInput() ?>
    <?= $form->field($model, 'rail_completed')->textInput() ?>
    <?= $form->field($model, 'contact_wire_completed')->textInput() ?>
    <?= $form->field($model, 'aec_erection_completed')->textInput() ?>
    <?= $form->field($model, 'aec_clamping_completed')->textInput() ?>
    <?= $form->field($model, 'bec_laying_completed')->textInput() ?>
</div>


<div class="ohe-progress-form">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>


