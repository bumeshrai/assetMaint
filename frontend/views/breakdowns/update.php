<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Breakdown */

$this->title = 'Update Breakdown: ' . $model->bd_id;
$this->params['breadcrumbs'][] = ['label' => 'Breakdowns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bd_id, 'url' => ['view', 'id' => $model->bd_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="breakdown-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
