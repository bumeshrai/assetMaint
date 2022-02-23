<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Breakdown */

$this->title = 'Report a Breakdown';
$this->params['breadcrumbs'][] = ['label' => 'Breakdown Report', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?> 
<div class="row">
    <div class="col-lg-8">
        <h1>Report a Breakdown</h1>
        <?= $form->field($model, 'corr_id')->dropDownList($this->params['itemCorridors'],
            ['prompt' => '--- choose from ---', 
              'onchange'=>'
                        $.get( "'.Url::toRoute('/breakdowns/stationlist').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'stn_id').'" ).html( data );
                            });'
            ]);  ?>
        <?= $form->field($model, 'stn_id')->dropDownList([ 'prompt' => '--- choose from ---' ]) ?>
       <?= $form->field($model, 'ename_id')->dropDownList($this->params['itemEquipmentNames'],['prompt' => '--- choose from ---',]);  ?>
        <?= $form->field($model,'enos_id')->textInput()  ?>
    	<?= $form->field($model, 'level_id')->dropDownList($this->params['itemLevels'],[ 'prompt' => '--- choose location ---' ,]) ?>
    	<?= $form->field($model, 'reported_by')->textInput(['maxlength' => true]) ?>
    	<?= $form->field($model, 'bd_description')->textarea(['rows' => 3]) ?>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
</div>