<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StationCode */

$this->title = $model->stn_id;
$this->params['breadcrumbs'][] = ['label' => 'Station Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-code-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->stn_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->stn_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'stn_id',
            'station_name',
            'station_code',
            'corr_id',
        ],
    ]) ?>

</div>
