<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\VacFan */

$this->title = $model->vac_fan_id;
$this->params['breadcrumbs'][] = ['label' => 'VAC Fans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vac-fan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vac_fan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vac_fan_id], [
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
            'vac_fan_id',
            'freq_id',
            'quarterly_cleaning:boolean',
            'quarterly_electrical_check:boolean',
            'description:ntext',
            'asset_code',
            'maint_type_id',
            'eng_id',
            'contractor',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
