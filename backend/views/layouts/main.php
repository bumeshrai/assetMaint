<?php


/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
//use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
            'class' => 'navbar-inverse navbar-fixed-top navbar-nav',
            'style'=>'font-size: 20px; height: 60px; ',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        /*
        [
            'label' => 'Contracts',
            'items' => [
                 ['label' => 'Add Contracts', 'url' => '#'],
                 '<li class="divider"></li>',
                 ['label' => 'Live Contracts', 'url' => '#'],
                 ['label' => 'Old Contracts', 'url' => '#'],
            ],
        ],
        */
        [
            'label' => 'Assets',
            'items' => [
	            ['label' => 'Add Infra', 'items' => [
	               		['label' => 'Corridor', 'url' => ['/corridors/index']],
	               		['label' => 'Station', 'url' => ['/station-codes/index']],
	               		['label' => 'Location', 'url' => ['/levels/index']],
                        ['label' => 'SMS Recipients', 'url' => ['/sms-recipients/index']],
	               		]],
                 '<li class="divider"></li>',
                ['label' => 'Next Due Maint', 'url' => ['maintenance-next-dues/index']],
                ['label' => 'Breakdowns', 'items' => [
                        ['label' => 'All', 'url' => ['breakdowns/index']],
                        ['label' => 'L&E', 'url' => ['breakdowns/index-le']],
                        ['label' => 'VAC', 'url' => ['breakdowns/index-vac']],
                        ['label' => 'TVS', 'url' => ['breakdowns/index-tvs']],
                        ['label' => 'Reports', 'url' => ['reportgen/index']],
                        ['label' => 'Count', 'url' => ['reportgen/countbd']],
                        ]],
                 '<li class="divider"></li>',
	            ['label' => 'Equipments', 'items' => [
	               		['label' => 'Equip. Class', 'url' => ['/equipment-names/index']],
	               		['label' => 'Manufacturer', 'url' => ['/manufacturers/index']],
	               		['label' => 'Equip. Asset', 'url' => ['/equipments/index']],
	               		]],
            ],
        ],
        [
            'label' => 'Equipments',
            'items' => [
                    '<li class="dropdown-header">Maintenance Sheets</li>',
                    '<li class="divider"></li>',
                    ['label' => 'Escalators', 'url' => ['/escalators/index']],
                    ['label' => 'Lifts', 'url' => ['/lifts/index']],
                    ['label' => 'AC Pumps', 'url' => ['/ac-pumps/index']],
                    ['label' => 'AHUs', 'url' => ['/ahus/index']],
                    ['label' => 'Chillers', 'url' => ['/chillers/index']],
                    ['label' => 'Cooling Tower', 'url' => ['/cooling-towers/index']],
                    ['label' => 'FCUs', 'url' => ['/fcus/index']],
                    ['label' => 'VAC Electrical Panels', 'url' => ['/vac-electrical-panels/index']],
                    ['label' => 'VAC Fans', 'url' => ['/vac-fans/index']],
                    ['label' => 'VRFs', 'url' => ['/vrfs/index']],
              ],
        ],
        [
            'label' => 'TVS',
            'items' => [
                '<li class="dropdown-header">Maintenance Sheets</li>',
                '<li class="divider"></li>',
               ['label' => 'Fans', 'items' => [
                    ['label' => 'TVF', 'url' => ['/tunnel-ventilation-fans/index']],
                    ['label' => 'TEF', 'url' => ['#']],
                    ]],
                ['label' => 'Dampers', 'items' => [
                    ['label' => 'TVD', 'url' => ['/tunnel-ventilation-dampers/index']],
                    ['label' => 'TED', 'url' => ['#']],
                    ['label' => 'DRD', 'url' => ['#']],
                    ]],
               ['label' => 'VSD', 'url' => ['#']],
            ],
        ],
        /*
        [
            'label' => 'Users',
            'items' => [
                 ['label' => 'Add CMRL Users', 'url' => '#'],
                 '<li class="divider"></li>',
                 '<li class="dropdown-header">Outsiders</li>',
                 ['label' => 'Add Service Engineers', 'url' => '#'],
            ],
        ],
        */
        Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                '<li>' . Html::a('Logout (' . Yii::$app->user->identity->username . ')', 
                    ['/site/logout'], ['data-method' => 'post']).'</li>'
                )
    ];
    
    /*
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'my-btn btn-primary']
            )
            . Html::endForm()
            . '</li>';
    }
    */

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
