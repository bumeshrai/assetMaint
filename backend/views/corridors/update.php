<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Corridor */

$this->title = 'Update Corridor: ' . $model->corr_id;
$this->params['breadcrumbs'][] = ['label' => 'Corridors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->corr_id, 'url' => ['view', 'id' => $model->corr_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="corridor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
