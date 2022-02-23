<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EquipmentName */

$this->title = 'Update Equipment Name: ' . $model->ename_id;
$this->params['breadcrumbs'][] = ['label' => 'Equipment Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ename_id, 'url' => ['view', 'id' => $model->ename_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="equipment-name-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
