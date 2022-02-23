<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Level */

$this->title = 'Update Location Label: ' . $model->level_id;
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->level_id, 'url' => ['view', 'id' => $model->level_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="level-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
