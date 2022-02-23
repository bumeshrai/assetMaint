<?php

/**
 * Update view for Maintenance Next Dues model. 
 * The model tracks all the scheduled maintenance for the asset. 
 *
 * B. Umesh Rai
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MaintenanceNextDue */

$this->title = 'Update Maintenance Next Due: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Maintenance Next Dues', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-lg-6">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
