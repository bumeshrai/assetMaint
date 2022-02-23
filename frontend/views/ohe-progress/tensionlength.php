<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\OheProgress */

$this->title = 'Select Section and Tension length ';
$this->params['breadcrumbs'][] = ['label' => 'OHE Progress', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ohe-progress-form">
	
	<?php //print_r($sectionTensionLength);?>

    <?php $form = ActiveForm::begin(); ?>
    <?php while ($sectionName = current($sectionTensionLength)) { ?>
    	<input type="radio" name="section" value="<?php echo key($sectionTensionLength); ?>">&nbsp<?php echo $sectionName; ?><br><br>
	<?php next($sectionTensionLength); } ?>
<br>

</div>


<div class="ohe-progress-form">
        <?= Html::submitButton('Select', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>


