<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;



/* @var $this yii\web\View */
/* @var $model common\models\SmsRecipient */

$this->title = 'Create Sms Recipient';
$this->params['breadcrumbs'][] = ['label' => 'Sms Recipients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?> 
<div class="row">
    <div class="my-col-lg-6">
        <h1>SMS Recipients form</h1>
        <?= $form->field($model, 'ename_id')->dropDownList($this->params['itemEquipmentNames'],
            [   'prompt' => '--- choose from ---' ]) ?>
	    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
	    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>
