<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OheProgress */

$this->title = 'Update Ohe Progress: ' . $model->ohe_id;
$this->params['breadcrumbs'][] = ['label' => 'Ohe Progress', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ohe_id, 'url' => ['view', 'id' => $model->ohe_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ohe-progress-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
