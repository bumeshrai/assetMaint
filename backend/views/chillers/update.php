<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Chiller */

$this->title = 'Update Chiller: ' . $model->chiller_id;
$this->params['breadcrumbs'][] = ['label' => 'Chillers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->chiller_id, 'url' => ['view', 'id' => $model->chiller_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="chiller-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
