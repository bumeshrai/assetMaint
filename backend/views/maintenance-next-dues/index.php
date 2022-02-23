<?php

/**
 * Index view for Maintenance Next Dues model. 
 * The model tracks all the scheduled maintenance for the asset. 
 *
 * B. Umesh Rai
 */

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MaintenanceNextDueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maintenance Next Dues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maintenance-next-due-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Maintenance Next Due', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showOnEmpty' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'asset_code',
            'controller',
            /*[
                'attribute'=>'maint_daily',
                'label'=>'Daily Maint Due',
                'contentOptions' =>['class' => 'table_class','style'=>'display:block;'],
                'format' =>  ['date', 'php:d-M-Y'],
            ],*/
            
            // 'maint_weekly',
            // 'maint_fortnightly',
            [
                'attribute'=>'maint_monthly',
                'label'=>'Monthly Maint Due',
                'format' =>  ['date', 'php:d-M-Y'],
            ],
            [
                'attribute'=>'maint_quaterly',
                'label'=>'3 Monthly Maint Due',
                'format' =>  ['date', 'php:d-M-Y'],
            ],
            [
                'attribute'=>'maint_biannual',
                'label'=>'6 Monthly Maint Due',
                'format' =>  ['date', 'php:d-M-Y'],
            ],
            [
                'attribute'=>'maint_annual',
                'label'=>'Annual Maint Due',
                'format' =>  ['date', 'php:d-M-Y'],
            ],
            //'maint_biennial',
            //'maint_triennial',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Action',
                'template' => '{view} {update} {delete} {link}',

            ],
        ],
    ]); ?>
</div>
