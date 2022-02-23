<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StationEarning */

$this->title = $model->earning_id;
$this->params['breadcrumbs'][] = ['label' => 'Station Earnings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-earning-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->earning_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->earning_id], [
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
            'earning_id',
            'date_on',
            'stn_id',
            'cash',
            'card',
            'voucher',
            'web',
            'non_fare',
        ],
    ]) ?>

</div>
