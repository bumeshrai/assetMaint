<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PowerReading */

$this->title = $model->reading_id;
$this->params['breadcrumbs'][] = ['label' => 'Power Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="power-reading-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->reading_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->reading_id], [
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
            'reading_id',
            'date_on',
            'supply',
            'receiving_station',
            'active_power',
            'total_power',
            'solar_generation',
            'maximum_demand',
            'power_factor',
        ],
    ]) ?>

</div>
