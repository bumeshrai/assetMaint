<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StationEarning */

$this->title = 'Create Station Earning';
$this->params['breadcrumbs'][] = ['label' => 'Station Earnings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-earning-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
