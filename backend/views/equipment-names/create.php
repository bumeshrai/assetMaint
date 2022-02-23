<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\EquipmentName */

$this->title = 'Create Equipment Class';
$this->params['breadcrumbs'][] = ['label' => 'Equipment Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(); ?> 
<div class="row">
    <div class="col-lg-8">
        <h1>Create New Equipment Group</h1>
        <?= $form->field($model, 'ename_name')?>
        <h4>Maintenance Schedules Required</h4>
        <?= $form->field($model, 'maint_daily')->checkbox() ?>
        <?= $form->field($model, 'maint_weekly')->checkbox() ?>
        <?= $form->field($model, 'maint_fortnightly')->checkbox() ?>
        <?= $form->field($model, 'maint_monthly')->checkbox() ?>
        <?= $form->field($model, 'maint_quaterly')->checkbox() ?>
        <?= $form->field($model, 'maint_biannual')->checkbox() ?>
        <?= $form->field($model, 'maint_annual')->checkbox() ?>
        <?= $form->field($model, 'maint_biennial')->checkbox() ?>
        <?= $form->field($model, 'maint_triennial')->checkbox() ?>
		<hr width="600" align="left">        
		<h4>Do you want to add Manufacturers now</h4>
        <?= $form->field($model, 'manufacturerAdd')->checkbox() ?>
	</div>
</div>
<div class="form-group">
    <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
</div>
