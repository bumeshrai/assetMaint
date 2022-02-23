<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TunnelVentilationDamper */

$this->title = 'Update Tunnel Ventilation Damper: ' . $model->tvd_id;
$this->params['breadcrumbs'][] = ['label' => 'Tunnel Ventilation Dampers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tvd_id, 'url' => ['view', 'id' => $model->tvd_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tunnel-ventilation-damper-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
