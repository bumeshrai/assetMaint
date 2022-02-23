<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SmsRecipientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sms Recipients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sms-recipient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sms Recipient', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'sms_id',
            //'ename_id',
            [
                'attribute' => 'equipment_name',
                'value' => 'equipment_name.ename_name'
            ],
            'mobile',
            'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
