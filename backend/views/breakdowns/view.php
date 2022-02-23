<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Breakdown */

$this->title = $model->bd_id;
$this->params['breadcrumbs'][] = ['label' => 'Breakdowns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="breakdown-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bd_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bd_id], [
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
            'bd_id',
            'asset_code',
            'reported_by',
            'attended:boolean',
            'classify_BD:boolean',
            'resp_contractor:boolean',
            'reporting_time:datetime',
            'attended_by',
            'repaired_time:datetime',
            'bd_description:ntext',
            'repair_description:ntext',
        ],
    ]) ?>

</div>
