<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CoolingTower */

$this->title = 'Update Cooling Tower: ' . $model->cooling_tower_id;
$this->params['breadcrumbs'][] = ['label' => 'Cooling Towers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cooling_tower_id, 'url' => ['view', 'id' => $model->cooling_tower_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cooling-tower-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
