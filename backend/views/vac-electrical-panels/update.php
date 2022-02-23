<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VacElectricalPanel */

$this->title = 'Update VAC Electrical Panel: ' . $model->vac_electrical_panel_id;
$this->params['breadcrumbs'][] = ['label' => 'VAC Electrical Panels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vac_electrical_panel_id, 'url' => ['view', 'id' => $model->vac_electrical_panel_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vac-electrical-panel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
