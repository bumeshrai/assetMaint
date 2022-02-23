<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TunnelVentilationFan */

$this->title = 'Update Tunnel Ventilation Fan: ' . $model->tvf_id;
$this->params['breadcrumbs'][] = ['label' => 'Tunnel Ventilation Fans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tvf_id, 'url' => ['view', 'id' => $model->tvf_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tunnel-ventilation-fan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
