<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ahu */

$this->title = 'Update AHU: ' . $model->ahu_id;
$this->params['breadcrumbs'][] = ['label' => 'AHUs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ahu_id, 'url' => ['view', 'id' => $model->ahu_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ahu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
