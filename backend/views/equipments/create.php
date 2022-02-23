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
.my-col-lg-4 {
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
  width: 20%;
  float: left;
}
EOT_CSS
);

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Equipment */

$this->title = 'Create New Equipment';
$this->params['breadcrumbs'][] = ['label' => 'Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?> 
<div class="row">
    <div class="my-col-lg-12">
        <h1>New Equipment form</h1>
        <?= $form->field($model, 'corr_id')->dropDownList($this->params['itemCorridors'],
            ['prompt' => '--- choose from ---', 
              'onchange'=>'
                        $.get( "'.Url::toRoute('/equipments/stationlist').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'stn_id').'" ).html( data );
                            });'
            ]);  ?>
        <?= $form->field($model, 'stn_id')->dropDownList([ 'prompt' => '--- choose from ---' ]) ?>
        <?= $form->field($model, 'ename_id')->dropDownList($this->params['itemEquipmentNames'],
            ['prompt' => '--- choose from ---', 
        	    'onchange'=>'
                        $.get( "'.Url::toRoute('/equipments/equipmentlist').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'manuf_id').'" ).html( data );
                            });'
            ]);  ?>
        <?= $form->field($model, 'manuf_id')->dropDownList([ 'prompt' => '--- choose from ---' ]) ?>  
        <?= $form->field($model,'enos_id')  ?>
    	<?= $form->field($model, 'level_id')->dropDownList($this->params['itemLevels'],[ 'prompt' => '--- choose location ---' ,]) ?>
    </div>
</div>
<div class="row">
    <div class="my-col-lg-4">
        <?= $form->field($model, 'installation_date')->input('date') ?>   
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
</div>
