<?php
$this->registerCss( <<< EOT_CSS
.my-col-lg-12 {
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
  width: 50%;
  float: left;
}

EOT_CSS
);

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Manufacturer */

$this->title = 'Create Manufacturer';
$this->params['breadcrumbs'][] = ['label' => 'Manufacturers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?> 
<div class="row">
    <div class="my-col-lg-12">
        <h1>Equipment Manufacturer form</h1>
        <?= $form->field($model, 'ename_id')->dropDownList($this->params['itemEquipmentNames'],
            [   'prompt' => '--- choose from ---' ]) ?>
        <?= $form->field($model,'name')  ?>
        <?= $form->field($model,'country')  ?>
        <?= $form->field($model,'contact_person')  ?>
        <?= $form->field($model,'contact_phone')  ?>
        <?= $form->field($model,'contact_email')->input('email')  ?>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
</div>
 