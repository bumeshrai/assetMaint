<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SmsRecipient */

$this->title = 'Update Sms Recipient: ' . $model->sms_id;
$this->params['breadcrumbs'][] = ['label' => 'Sms Recipients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sms_id, 'url' => ['view', 'id' => $model->sms_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sms-recipient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
