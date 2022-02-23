<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EquipmentName */

$this->title = $model->ename_id;
$this->params['breadcrumbs'][] = ['label' => 'Equipment Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-name-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ename_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ename_id], [
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
            'ename_id',
            'ename_name',
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
