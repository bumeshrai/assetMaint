<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CorridorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Corridors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="corridor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Corridor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'corr_id',
            'corr_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
