<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Manufacturer */

$this->title = 'Update Manufacturer: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Manufacturers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->manuf_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manufacturer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
