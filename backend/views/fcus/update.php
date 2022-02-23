<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fcu */

$this->title = 'Update FCU: ' . $model->fcu_id;
$this->params['breadcrumbs'][] = ['label' => 'FCUs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fcu_id, 'url' => ['view', 'id' => $model->fcu_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fcu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
