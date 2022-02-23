<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Fcu */

$this->title = $model->fcu_id;
$this->params['breadcrumbs'][] = ['label' => 'FCUs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fcu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->fcu_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->fcu_id], [
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
            'fcu_id',
            'freq_id',
            'weekly_cleaning:boolean',
            'quarterly_cleaning:boolean',
            'annually_cleaning:boolean',
            'quarterly_sensible_check:boolean',
            'annually_sensible_check:boolean',
            'quarterly_tightness_check:boolean',
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
