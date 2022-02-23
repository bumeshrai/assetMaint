<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OheProgress */

$this->title = $model->ohe_id;
$this->params['breadcrumbs'][] = ['label' => 'Ohe Progress', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ohe-progress-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ohe_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ohe_id], [
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
            'ohe_id',
            'section',
            'direction',
            'tension_number',
            'tension_length',
            'expansion_joint_total',
            'expansion_joint_completed',
            'marking_total',
            'marking_completed',
            'bolt_total',
            'bolt_completed',
            'bracket_total',
            'bracket_completed',
            'rail_total',
            'rail_completed',
            'contact_wire_total',
            'contact_wire_completed',
            'aec_erection_total',
            'aec_erection_completed',
            'aec_clamping_total',
            'aec_clamping_completed',
            'bec_laying_total',
            'bec_laying_completed',
            'date_to_finish',
            'date_finished',
            'work_completed',
        ],
    ]) ?>

</div>
