<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AcPump */

$this->title = 'Update VAC Pump: ' . $model->ac_pump_id;
$this->params['breadcrumbs'][] = ['label' => 'VAC Pump', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ac_pump_id, 'url' => ['view', 'id' => $model->ac_pump_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ac-pump-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
