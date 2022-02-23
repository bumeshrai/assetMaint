<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lift */

$this->title = 'Update Lift Maintenance Schedule: ' . $model->lift_id;
$this->params['breadcrumbs'][] = ['label' => 'Lifts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lift_id, 'url' => ['view', 'id' => $model->lift_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lift-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
