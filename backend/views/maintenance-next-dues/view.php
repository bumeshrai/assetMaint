<?php

/**
 * View form for Maintenance Next Dues model. 
 * The model tracks all the scheduled maintenance for the asset. 
 *
 * B. Umesh Rai
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MaintenanceNextDue */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Maintenance Next Dues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maintenance-next-due-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'asset_code',
            'controller',
            'maint_daily',
            'maint_weekly',
            'maint_fortnightly',
            'maint_monthly',
            'maint_quaterly',
            'maint_biannual',
            'maint_annual',
            'maint_biennial',
            'maint_triennial',
        ],
    ]) ?>

</div>
