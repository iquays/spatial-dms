<?php

use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Informasi Pengelolaan Data dan Informasi Berbasis Spasial Tuban">
    <meta name="author" content="Syauqi">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="icon" href="../favicon.ico">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="menuclose menuclose-right rounded">
<div id="page-container">
    <?php $this->beginBody() ?>
    <div class="nav-menu bg-gradient">
        <nav class="navbar navbar-dark navbar-expand-md">
            <!--        <div class="container-fluid">-->
            <!--            <div class="navbar-header">-->
            <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>"><?= Yii::$app->name ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                    aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
            <!--</div>-->
            <div class="collapse navbar-collapse" id="navbar">

                <?php
                echo \yii\widgets\Menu::widget([
                        'items' => [
                            ['label' => ' BERANDA', 'url' => ['site/index']],
                            ['label' => ' PETA INTERAKTIF', 'url' => ['site/peta']],
                            ['label' => ' PETA CETAK', 'url' => ['peta-cetak/index']],
                            ['label' => ' LAYANAN', 'url' => ['minta-layanan/create']],
                            ['label' => '<span><i class="fa fa-user-secret"></i></span> ADMIN', 'url' => ['/backend/site/index']],
                        ],
                        'itemOptions' => [
                            'class' => 'nav-item ',
                        ],
                        'options' => [
                            'class' => 'navbar-nav ml-auto',
                        ],
                        'encodeLabels' => false,
                        'linkTemplate' => '<a href="{url}" class="nav-link">{label}</a>',
                    ]
                );
                ?>
            </div>
        </nav>
    </div>


    <?php
    //echo \luya\bootstrap4\widgets\Breadcrumbs::widget([
    //    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    //])
    ?>


    <?= Alert::widget() ?>
    <!--<div class="content pt-5 mt-2">-->
    <div id="content">
        <?php echo $content ?>
    </div>
    <div class="container-fluid dark_bg text-white" id="my-footer">
        <div class="footer-links row mb-0">
            <div class="col-lg-5 col-md-4 col-sm-6 col-16 my-4 text-white-50">
                <h4 class="text-white-50 pb-2">Tentang SI-KEDAI SPATU</h4>
                <p>
                    Sistem Informasi Tata Ruang dan Geospatial (SITRG) Provinsi Jawa Timur merupakan Informasi Data dan
                    Peta
                    berbasis Sistem Informasi Geografis dari RTRW Provinsi Jawa Timur.
                </p>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-16 my-4 text-white-50">
                <h4 class="text-white-50 pb-2">Hubungi Kami</h4>
                <p class="mb-0">BAPPEDA KABUPATEN TUBAN</p>
                <p class="mt-0">Bidang Penelitian dan Pengembangan</p>
                <table>
                    <tr>
                        <td><i class="fa fa-phone"></i></td>
                        <td class="pl-1">(031)-3550528</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-envelope-o"></i></td>
                        <td class="pl-1">tarujatim@gmail.com</td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-16 my-4 text-white-50">
                <h4 class="text-white-50">Social Links</h4>
                <ul class="nav ">
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-facebook"></i></a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-twitter"></i></a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-pinterest"></i></a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-google-plus"></i></a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <footer>
            <div class="row text-white-50">
                <p class="col-lg col-md-16 copyright">&copy; BAPPEDA Kabupaten Tuban, 2019; <a
                            href="&#x6d;&#x61;&#x69;&#108;&#116;&#111;&#x3a;&#x73;&#121;&#97;&#117;&#113;&#105;&#x40;&#x70;&#x65;&#x6e;&#115;&#46;&#97;&#99;&#x2e;&#105;&#x64;">SQ
                        PENS</a>
                </p>
            </div>
        </footer>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
