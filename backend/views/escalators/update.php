<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Escalator */

$this->title = 'Update Escalator Maintenance Schedule: ' . $model->escl_id;
$this->params['breadcrumbs'][] = ['label' => 'Escalators', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->escl_id, 'url' => ['view', 'id' => $model->escl_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="escalator-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
