<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Corridor */

$this->title = 'Create Corridor';
$this->params['breadcrumbs'][] = ['label' => 'Corridors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="corridor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
