<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;



/* @var $this yii\web\View */
/* @var $model common\models\PowerReading */

$this->title = 'Enter Meter Readings';
$this->params['breadcrumbs'][] = ['label' => 'Power Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-6">
    <h1><?= Html::encode($this->title) ?></h1>

	<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'date_on')->input('date')  ?>
    <?= $form->field($model, 'receiving_station')->radioList(array('ARSS'=>'Alandur RSS','KRSS'=>'Koyembedu RSS', 'CRSS'=>'Chennai Central RSS', 'SOLAR' => 'Solar Generation'));  ?>
    <?= $form->field($model, 'supply')->radioList(array('110'=>'110 KV',33=>'33 KV', 25=>'25 KV', 415 => '415 Volt'));  ?>
    <?= $form->field($model, 'active_power')->textInput() ?>
    <?= $form->field($model, 'total_power')->textInput() ?>
    <?= $form->field($model, 'solar_generation')->textInput() ?>
    <?= $form->field($model, 'maximum_demand')->textInput() ?>
    <?= $form->field($model, 'power_factor')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


</div>
