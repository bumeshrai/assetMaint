<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EquipmentNameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipment Names';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-name-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Equipment Name', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ename_id',
            'ename_name',
            'maint_daily:boolean',
            'maint_weekly:boolean',
            'maint_fortnightly:boolean',
            'maint_monthly:boolean',
            'maint_quaterly:boolean',
            'maint_biannual:boolean',
            'maint_annual:boolean',
            'maint_biennial:boolean',
            'maint_triennial:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
