<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VacFan */

$this->title = 'Update VAC Fan: ' . $model->vac_fan_id;
$this->params['breadcrumbs'][] = ['label' => 'VAC Fans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vac_fan_id, 'url' => ['view', 'id' => $model->vac_fan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vac-fan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
