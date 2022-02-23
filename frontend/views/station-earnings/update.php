<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StationEarning */

$this->title = 'Update Station Earning: ' . $model->earning_id;
$this->params['breadcrumbs'][] = ['label' => 'Station Earnings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->earning_id, 'url' => ['view', 'id' => $model->earning_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="station-earning-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
