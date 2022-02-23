<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Corridor */

$this->title = $model->corr_id;
$this->params['breadcrumbs'][] = ['label' => 'Corridors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="corridor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->corr_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->corr_id], [
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
            'corr_id',
            'corr_name',
        ],
    ]) ?>

</div>
