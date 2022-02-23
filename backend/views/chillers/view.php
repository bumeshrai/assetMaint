<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Chiller */

$this->title = $model->chiller_id;
$this->params['breadcrumbs'][] = ['label' => 'Chillers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chiller-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->chiller_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->chiller_id], [
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
            'chiller_id',
            'freq_id',
            'quarterly_functional_check:boolean',
            'quarterly_leak_testing_check:boolean',
            'daily_record_the_reading:boolean',
            'quarterly_record_the_reading:boolean',
            'quarterly_sensible_check:boolean',
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
