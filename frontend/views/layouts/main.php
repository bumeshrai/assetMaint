<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use kartik\nav\NavX;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' =>  Html::img('@web/images/cmrl.png', ['alt'=>Yii::$app->name]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            'style'=>'font-size: 20px; height: 60px; ',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Breakdown', 
            'items' => [
                ['label' => 'Report BD', 'url' => ['/breakdowns/create']],
                ['label' => 'Monthly Failure', 'url' => ['/breakdowns/monthly-reading']],
                ['label' => 'Stationwise Failure', 'url' => ['/breakdowns/station-fault']],
                ['label' => 'Equipmentwise Failure', 'url' => ['/breakdowns/equipment-fault']],
              ],
        ],
        ['label' => 'Meter Readings', 
            'items' => [
                ['label' => 'Daily Readings', 'url' => ['/power-readings/index']],
                ['label' => 'Monthly Table', 'url' => ['/power-readings/monthly-reading']],
                ['label' => 'Monthly Graph', 'url' => ['/power-readings/monthly-graph']],
                ['label' => 'Daily Reading of a Month', 'url' => ['/power-readings/month-daily-reading']],
              ],
        ],
        ['label' => 'OHE Progress', 
            'items' => [
                ['label' => 'Overall Progress', 'url' => ['/ohe-progress/index']],
                ['label' => 'Section Progress', 'url' => ['/ohe-progress/tensionlength']],
              ],
        ],
        ['label' => 'Stations', 
            'items' => [
                ['label' => 'Earnings', 'url' => ['/station-earnings/index']],
                ['label' => 'Earnings Graph', 
                'items' => [
                        ['label' => 'Daily', 'url' => ['/station-earnings/daily']],
                        ['label' => 'Month', 'url' => ['/station-earnings/month']],
                        //['label' => 'Year', 'url' => ['/station-earnings/year']],
                        //['label' => 'Cummulative', 'url' => ['/station-earnings/cummulative']],
                    ],
              ]],
        ],
        //['label' => 'Contact', 'url' => ['/site/contact']],
        ['label' => 'L&E',
            'items' => [
                '<li class="dropdown-header">Maintenance Schedule</li>',
                '<li class="divider"></li>',
                ['label' => 'Escalators', 'url' => ['/site/escalator']],
                ['label' => 'Lifts', 'url' => ['/site/lift']],
                ['label' => 'AC Equipment', 'url' => ['/site/acequipment']],
              ],
        ],
        //['label' => 'Signup', 'url' => ['/site/signup']],
    ];
    
    /*if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }*/
    
    // Nav becomes NavX for kartik Nav
    echo NavX::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'activateParents' => true,
        'encodeLabels' => false
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; CMRL Ventilation Group <?= date('Y') ?></p>

<!--         <p class="pull-right"><?= Yii::powered() ?></p>
 -->    
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
