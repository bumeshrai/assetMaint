<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vrf */

$this->title = 'Update Vrf: ' . $model->vrf_id;
$this->params['breadcrumbs'][] = ['label' => 'VRFs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vrf_id, 'url' => ['view', 'id' => $model->vrf_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vrf-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
