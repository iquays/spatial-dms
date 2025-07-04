<?php

use backend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\assets\AdminuxLightBlueHeaderAsset;
use yii\widgets\Menu;
use kartik\alert\AlertBlock;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
AdminuxLightBlueHeaderAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SITR Pemprov Jatim">
    <meta name="author" content="Ahmad Syauqi Ahsan">
    <link rel="icon" href="../favicon.ico">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="menuclose-right">
<?php $this->beginBody() ?>

<header class="navbar-fixed">
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-faded">
        <div class="sidebar-left"><a class="navbar-brand imglogo" href="<?= Yii::$app->homeUrl ?>"></a>
            <button class="btn btn-link icon-header mr-sm-2 pull-right menu-collapse"><span
                        class="fa fa-bars left-icon circle"></span>
            </button>
        </div>
        <div class="d-flex mr-auto"> &nbsp;</div>
        <ul class="navbar-nav content-right">
            <li class="v-devider"></li>
            <li class="v-devider"></li>
        </ul>
        <div class="sidebar-right pull-right ">
            <ul class="navbar-nav  justify-content-end">
                <!-- <li class="nav-item">
                  <button class="btn-link btn userprofile"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="userpic"><img src="" alt="user pic"></span> <span class="text">Maxartkiller</span></button>
                  <div class="dropdown-menu"> <a class="dropdown-item" href="customerprofile.html">Profile</a> <a class="dropdown-item" href="#">Analytics Report</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Setting</a> </div>
                </li> -->
                <?php
                if (!Yii::$app->user->isGuest) {
                    echo Menu::Widget(
                        [
                            'items' => [
                                ['label' => Yii::t('app', 'Logout') . ' (' . Yii::$app->user->identity->username . ')',
                                    'url' => ['/site/logout'],
                                    'options' => ['data-method' => 'post'],
                                ],
                            ],
                            'options' => [
                                'class' => 'navbar-nav',
                            ],
                            'encodeLabels' => false,
                            'linkTemplate' => '<a href="{url}" class="btn btn-link icon-header">{label}</a>',
                        ]
                    );
                }
                ?>
            </ul>
        </div>
    </nav>
</header>
<!-- Navbar Top End -->

<?= AlertBlock::widget([
    'useSessionFlash' => true,
    'type' => AlertBlock::TYPE_GROWL,
    'delay' => 10, // delay before alert is displayed
    'alertSettings' => [
        'info' => [
            'pluginOptions' => [
                'delay' => 10,
                'timer' => 150000,
                'placement' => [
                    'from' => 'top',
                    'align' => 'right',
                ]
            ]
        ],
        'warning' => [
            'pluginOptions' => [
                'delay' => 10,
                'timer' => 1500,
                'placement' => [
                    'from' => 'top',
                    'align' => 'right',
                ]
            ]
        ]
    ]
]) ?>

<!-- Sidbar Menu -->
<div class="sidebar-left">
    <ul class="nav flex-column in" id="side-menu">
        <li class="title-nav">MAIN MENU</li>
        <li>
            <hr>
        </li>
        <?php

        ?>

        <?php
        echo Menu::Widget(
            [
                'items' => [
                    ['label' => '<span><i class="fa fa-tachometer left-icon circle"></i></span> Dashboard', 'url' => ['site/index']],
                    ['label' => '<span><i class="fa fa-newspaper-o left-icon circle"></i></span> Berita', 'url' => ['article/index']],
                    ['label' => '<span><i class="fa fa-map-o left-icon circle"></i></span> Layer Peta', 'url' => ['map-layer/index']],
                    ['label' => '<span><i class="fa fa-map left-icon circle"></i></span> Edit Data Peta', 'url' => ['map-layer/mapedit']],
                    'options' => [
                        'class' => 'nav-item'
                    ]
                ],
                'options' => [
                    'class' => 'nav flex-column in',
                    'id' => 'side-menu',
                ],
                'encodeLabels' => false,
                'linkTemplate' => '<a href="{url}" class="nav-link">{label}</a>',
            ]
        );
        if (Yii::$app->user->can('admin')) {
            echo Menu::Widget(
                [
                    'items' => [
                        ['label' => '<hr>', 'options' => ['class' => 'title-nav']],
                        ['label' => '<span><i class="fa fa-users left-icon circle"></i></span> Manajemen User', 'url' => ['user/index']],
                        'options' => [
                            'class' => 'nav-item'
                        ]
                    ],
                    'options' => [
                        'class' => 'nav flex-column in',
                        'id' => 'side-menu',
                    ],
                    'encodeLabels' => false,
                    'linkTemplate' => '<a href="{url}" class="nav-link">{label}</a>',
                ]
            );
        }
        ?>

        <li>
            <hr>
        </li>
    </ul>
</div>

<!-- Sidbar Menu End -->
<div class="wrapper-content pb-0 pr-0 pl-0" id="content" style="padding-top: 55px">
    <!--    <div class="container-fluid">-->
    <?= $content ?>
    <!--    </div>-->
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
