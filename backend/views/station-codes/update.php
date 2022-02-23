<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StationCode */

$this->title = 'Update Station Code: ' . $model->stn_id;
$this->params['breadcrumbs'][] = ['label' => 'Station Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stn_id, 'url' => ['view', 'id' => $model->stn_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="station-code-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
