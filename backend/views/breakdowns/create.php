<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Breakdown */

$this->title = 'Create Breakdown';
$this->params['breadcrumbs'][] = ['label' => 'Breakdowns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="breakdown-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
